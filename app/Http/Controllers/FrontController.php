<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\EmployeeLog;
use App\Models\Visitor;
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
        $visitors = Visitor::latest()->whereDate('date_visit', $currentDate)->get();
        $employees_log = EmployeeLog::with('employee_details')->latest()->whereDate('date_log', $currentDate)->get();
        return view('index', compact('employees', 'visitors', 'employees_log'));
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
            $data->status = 'out';
            $data->save();
            $data->name =  $employee_name;
            return response()->json($data);
        }
    }
    public function return_employee(Request $req){


        $employee_log = EmployeeLog::find($req->id);
        
        $timeOut = Carbon::parse($employee_log->time_out);
        $timeBack = Carbon::now();
        $timeConsumed = $timeOut->diffInSeconds($timeBack);

        $employee_log->time_back = Carbon::now()->toTimeString();
        $employee_log->time_consumed = $timeConsumed;
        $employee_log->status ='returned';
        $employee_log->save();
        return response()->json($employee_log);
    }
}

