<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    //
    public function employees(){
        $page_name = 'Employees';
        $employees = Employee::get();
        return view('employees.employees',compact('page_name', 'employees'));
    }
    public function view_employee($employee_id){
        $page_name = 'Employee Details';
        $employee = Employee::find($employee_id);
        return view('employees.employee',compact('page_name', 'employee'));
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
            $data->mname = $req->employee_id_number;
            $data->id_number = $req->employee_mname;
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
}
