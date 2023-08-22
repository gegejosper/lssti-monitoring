<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Employee;

class FrontController extends Controller
{
    //
    public function index(){
        $employees = Employee::where('status', 'active')->take(10)->get();
        return view('index', compact('employees'));
    }
    public function unknown_user(){
        return view('errors.unknown_user');
    }
}

