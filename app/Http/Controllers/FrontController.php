<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeLog;
use App\Models\Visitor;
use App\Models\Setting;
use Carbon\Carbon;
use Response;
use Validator;
class FrontController extends Controller
{
    //
    public function index(){
        $employees = Employee::where('status', 'active')->take(10)->get();
        $visitors = Visitor::get();
        $currentDate = Carbon::now()->toDateString();
        $setting = Setting::first();
        $visitors = Visitor::latest()->whereDate('date_visit', $currentDate)->get();
        $employees_log = EmployeeLog::with('employee_details')->latest()->whereDate('date_log', $currentDate)->get();
        return view('index', compact('employees', 'visitors', 'employees_log', 'setting'));
    }
    public function unknown_user(){
        return view('errors.unknown_user');
    }
    public function scan_employee($employee_id){
        $employee_result = Employee::where('id', $employee_id)->get();
        return response()->json($employee_result);
    }

    public function save_record(Request $req){
        $validator = Validator::make($req->all(), [
            'fname' => 'required',
            'lname' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'purpose' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Visitor();
            $data->fname = strtoupper($req->fname);
            $data->id_number = strtoupper($req->id_number);
            $data->id_type = strtoupper($req->id_type);
            $data->lname = strtoupper($req->lname);
            $data->contact_number = $req->contact_number;
            $data->address = strtoupper($req->address);
            $data->purpose = strtoupper($req->purpose);
            $data->status = 'active';
            $data->date_visit = Carbon::now()->toDateString(); // Set the date to the current date
            $data->time_visit = Carbon::now()->toTimeString(); // Set the time to the current time
            $data->save();
            return response()->json($data);
        }
    }
    public function save_employee_log(Request $req){
        $setting = Setting::first();
        $validator = Validator::make($req->all(), [
            'id' => 'required',
            'purpose' => 'required',
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $employee = Employee::find($req->id);
            $employee_name = $employee->lname.', '.$employee->fname;
            $data = new EmployeeLog();
            $data->date_log = Carbon::now()->toDateString();
            $data->time_out = Carbon::now()->toTimeString();
            $data->time_back = 'n/a';
            $data->time_consumed = 'n/a';
            $data->employee_id = $req->id;
            $data->purpose = strtoupper($req->purpose);
            $data->penalty_amount = 0;
            $data->status = 'out';
            $data->save();
            $data->name =  $employee_name;
            if($setting->enable_sms == 'yes'){
                $this->send_sms($employee_name , 'out');
            }
            return response()->json($data);
        }

        
    }
    public function return_employee(Request $req){
        $setting = Setting::first();

        $employee_log = EmployeeLog::with('employee_details')->find($req->id);
        $employee_name = $employee_log->employee_details->lname.', '.$employee_log->employee_details->fname;
        $timeOut = Carbon::parse($employee_log->time_out);
        $timeBack = Carbon::now();
        $timeConsumed = $timeOut->diffInSeconds($timeBack);
        
        $hours = floor($timeConsumed / 3600);
        $minutes = ($timeConsumed / 60) % 60;
        //dd($hours);
        $penalty = 0;

        if($hours > $setting->hours){
            $penalty = $setting->penalty;
        }
        $employee_log->time_back = Carbon::now()->toTimeString();
        $employee_log->time_consumed = $timeConsumed;
        $employee_log->status ='returned';
        $employee_log->penalty_amount = $penalty;
        $employee_log->save();
        if($setting->enable_sms == 'yes'){
            $this->send_sms($employee_name , 'returned');
        }
        
        return response()->json($employee_log);
    }
    public function close_gate(Request $req){
        $setting = Setting::first();

        $employee_logs = EmployeeLog::where('status', 'out')->with('employee_details')->get();
        foreach($employee_logs as  $employee_log){
            $employee_name = $employee_log->employee_details->lname.', '.$employee_log->employee_details->fname;
            $timeOut = Carbon::parse($employee_log->time_out);
            $timeBack = Carbon::now();
            $timeConsumed = $timeOut->diffInSeconds($timeBack);
            
            $hours = floor($timeConsumed / 3600);
            $minutes = ($timeConsumed / 60) % 60;
           
            $employee_log->time_back = Carbon::now()->toTimeString();
            $employee_log->time_consumed = $timeConsumed;
            $employee_log->status ='not returned';
            $employee_log->penalty_amount = $setting->penalty;
            $employee_log->save();
            // if($setting->enable_sms == 'yes'){
            //     $this->send_sms($employee_name , 'returned');
            // }
        }
        
        return redirect('/');
    }

    public function send_sms($name, $logtype){
        $setting = Setting::first();
        $contact_numbers = $setting->contact_number;
        $contact_numbers_array = explode(',', $contact_numbers);
        $message = str_replace(
            array("#EMPLOYEE_NAME#", "#LOG_TYPE#"),
            array($name, $logtype),
            $setting->sms_message
        );
        $ch = curl_init();

        foreach ($contact_numbers_array as $contact_number) {
            $parameters = array(
                'apikey' => '61fdeb9ce3832a133c5a201d20e5aeac', // Your API KEY
                'number' => trim($contact_number), // Remove leading/trailing spaces
                'message' => $message,
                'sendername' => 'AZWAYPH'
            );
            curl_setopt($ch, CURLOPT_URL, 'https://semaphore.co/api/v4/messages');
            curl_setopt($ch, CURLOPT_POST, 1);

            // Send the parameters set above with the request
            curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($parameters));

            // Receive response from the server
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $output = curl_exec($ch);
        }

        curl_close($ch);
    }
}

