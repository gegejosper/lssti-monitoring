<?php

namespace App\Http\Controllers\Panel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Visitor;
use Response;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class VisitorController extends Controller
{
    //
    public function visitors(){
        $page_name = 'Visitors';
        $visitors = Visitor::get();
        return view('visitors.visitors',compact('page_name', 'visitors'));
    }
}
