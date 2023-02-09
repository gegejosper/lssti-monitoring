<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function unknown_user(){
        return view('errors.unknown_user');
    }
}

