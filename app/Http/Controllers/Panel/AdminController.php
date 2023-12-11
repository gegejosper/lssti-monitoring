<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use App\Models\Application;
use App\Models\User;
use App\Models\Role;
use App\Models\Visitor;
use App\Models\EmployeeLog;
use App\Models\Employee;
use App\Models\Department;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function dashboard(){
        $page_name = 'Dashboard';
        $visitors = Visitor::get();
        $currentDate = Carbon::now()->toDateString();
        $visitors = Visitor::latest()->whereDate('date_visit', $currentDate)->get();
        $employees_log = EmployeeLog::with('employee_details')->latest()->whereDate('date_log', $currentDate)->get();
        return view('panel.admin.dashboard',compact('page_name', 'employees_log', 'visitors'));
    }
    
    
    public function settings(){
        $page_name = 'Settings';
        $settings = Setting::first();
        //dd($settings);
        return view('panel.admin.settings',compact('page_name', 'settings'));
    }
    public function roles(){
        $page_name = 'Roles';
        $roles = Role::get();
        return view('panel.admin.roles',compact('page_name', 'roles'));
    }
    public function subscribers(){
        $page_name = 'Subscribers';
        
        return view('panel.admin.subscribers',compact('page_name'));
    }
    public function departments(){
        $page_name = 'Departments';
        $departments = Department::get();
        return view('panel.admin.departments',compact('page_name', 'departments'));
    }
    public function users(){
        $page_name = 'Users';
        $users = User::with('roles')->paginate(10);
        $roles = Role::where('name', '!=', 'member')->get();
//dd($users);
        return view('panel.admin.users',compact('page_name', 'users', 'roles'));
    }
    public function backup(){
        $page_name = 'Backup';
        return view('panel.admin.backup',compact('page_name'));
    }
    public function report_employees(){
        $page_name = 'Reports';
        $employee_logs =EmployeeLog::with('employee_details')->get();
        return view('panel.admin.reports.employees',compact('page_name', 'employee_logs'));
    }
    public function report_employee_range(Request $req){
        $page_name = 'Reports';
        $from_date = null;
        $to_date = null;
        if (isset($req->from_date) && isset($req->to_date)) {
            $from_date = Carbon::parse($req->from_date . ' 00:00:00');
            $to_date = Carbon::parse($req->to_date . ' 23:59:59');
        }
        $employee_logs =EmployeeLog::with('employee_details')
            ->when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                return $query->whereBetween('created_at', [$from_date->toDateTimeString(), $to_date->toDateTimeString()]);
            })
            ->get();
        return view('panel.admin.reports.employees',compact('page_name', 'employee_logs', 'from_date', 'to_date'));
    }

    public function report_visitors(){
        $page_name = 'Reports';
        $visitors =Visitor::get();
        return view('panel.admin.reports.visitors',compact('page_name', 'visitors'));
    }
    public function report_visitors_range(Request $req){
        $page_name = 'Reports';
        $from_date = null;
        $to_date = null;
        if (isset($req->from_date) && isset($req->to_date)) {
            $from_date = Carbon::parse($req->from_date . ' 00:00:00');
            $to_date = Carbon::parse($req->to_date . ' 23:59:59');
        }
        $visitors = Visitor::when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                return $query->whereBetween('created_at', [$from_date->toDateTimeString(), $to_date->toDateTimeString()]);
            })
            ->get();
        return view('panel.admin.reports.visitors',compact('page_name', 'visitors', 'from_date', 'to_date'));
    }
    public function report_penalties(){
        $page_name = 'Reports';
        $employee_logs =EmployeeLog::groupBy('employee_id')
        ->selectRaw('employee_id, MAX(created_at) as max_created_at')
        ->selectRaw('SUM(penalty_amount) as total_penalty')
        ->with('employee_details')->get();
        //dd($employee_logs);
        return view('panel.admin.reports.penalties',compact('page_name', 'employee_logs'));
    }
    public function report_penalties_range(Request $req){
        $page_name = 'Reports';
        $from_date = null;
        $to_date = null;
        if (isset($req->from_date) && isset($req->to_date)) {
            $from_date = Carbon::parse($req->from_date . ' 00:00:00');
            $to_date = Carbon::parse($req->to_date . ' 23:59:59');
        }
        $employee_logs =EmployeeLog::with('employee_details')
            ->when($from_date && $to_date, function ($query) use ($from_date, $to_date) {
                return $query->whereBetween('created_at', [$from_date->toDateTimeString(), $to_date->toDateTimeString()]);
            })
            ->selectRaw('employee_id, MAX(created_at) as max_created_at')
            ->selectRaw('SUM(penalty_amount) as total_penalty')
            ->get();
        return view('panel.admin.reports.penalties',compact('page_name', 'employee_logs', 'from_date', 'to_date'));
    }
}
