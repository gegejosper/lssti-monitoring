<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Department;
use App\Models\EmployeeLog;
use Response;
use Validator;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    //
    public function employees(){
        $page_name = 'Employees';
        $employees = Employee::get();
        $departments = Department::get();
        return view('employees.employees',compact('page_name', 'employees', 'departments'));
    }
    public function view_employee($employee_id){
        $page_name = 'Employee Details';
        $employee = Employee::find($employee_id);
        $employee_logs =EmployeeLog::with('employee_details')->where('employee_id', $employee_id)->get();
        return view('employees.employee',compact('page_name', 'employee', 'employee_logs'));
    }
    public function view_employee_range(Request $req){
        //dd($req);
        $page_name = 'Employee Details';
        $employee = Employee::find($req->employee_id);
        $from_date = null;
        $to_date = null;
        if (isset($req->from_date) && isset($req->to_date)) {
            $from_date = Carbon::parse($req->from_date . ' 00:00:00');
            $to_date = Carbon::parse($req->to_date . ' 23:59:59');
        }
        $employee_logs =EmployeeLog::with('employee_details')
            ->where('employee_id', $req->employee_id)
            ->when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                return $query->whereBetween('created_at', [$from_date->toDateTimeString(), $to_date->toDateTimeString()]);
            })
            ->get();
        
        //$employee_logs =EmployeeLog::with('employee_details')->where('employee_id', $employee_id)->get();
        return view('employees.employee',compact('page_name', 'employee', 'employee_logs'));
    }
    public function employees_add(Request $req){
        $validator = Validator::make($req->all(), [
            'employee_fname' => 'required',
            'employee_lname' => 'required',
            'employee_id_number' => 'required',
            'employee_mname' => 'required',
            'employee_position' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $data = new Employee();
            $data->fname = $req->employee_fname;
            $data->lname = $req->employee_lname;
            $data->mname = $req->employee_mname;
            $data->department = $req->employee_department;
            $data->id_number = $req->employee_id_number;
            $data->position = $req->employee_position;
            $data->status = 'active';
            $data->save();
            return response()->json($data);
        }
    }

    public function employees_update(Request $req){
        //dd($req);
        $validator = Validator::make($req->all(), [
            'employee_fname' => 'required',
            'employee_lname' => 'required',
            'employee_id_number' => 'required',
            'employee_mname' => 'required',
            'employee_position' => 'required'
        ]);
        if ($validator->fails()) {    
            return Response::json(array(
                'success' => false,
                'errors' => $validator->getMessageBag()->toArray()
            ), 400); // 400 being the HTTP code for an invalid request.
            //return response()->json(['errors' => $validator->messages(), 'status' => 422], 200);
        }
        else {
            $employee = Employee::find($req->employee_id);
            $data = Employee::find($req->employee_id);
            $data->id_number = $req->employee_id_number;
            $data->fname = $req->employee_fname;
            $data->mname = $req->employee_mname;
            $data->department = $req->employee_department;
            $data->lname = $req->employee_lname;
            $data->position = $req->employee_position;
            $data->save();
            if (Auth::check())
            {
                $name = Auth::user()->name;
            }
            Log::info($name.' updated Employee details of '.$employee->fname.' '.$employee->lname);
            return response()->json($data);
        }
    }

    public function employees_modify(Request $req){
        $data = Employee::find($req->employee_id);
        $data->status = $req->employee_status;
        $data->save();
        if (Auth::check())
        {
            $name = Auth::user()->name;
        }
        Log::info($name.' modified '.$data->employee_fname.' '.$data->employee_lname.' into '.$req->employee_status);
        return response()->json($data);
    }

    public function employees_search(Request $req){
        $searchTerm = '%'.$req->search_query.'%';
        
        $employee_result = Employee::where(function($query) use ($searchTerm){
                $query->where('fname','LIKE', $searchTerm)
                ->orWhere('lname','LIKE', $searchTerm);
            })
            ->take(20)->get();
        return response()->json($employee_result);
    }
    
}
