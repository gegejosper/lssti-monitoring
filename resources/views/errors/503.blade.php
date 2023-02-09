
@extends('errors::error-layout')
@section('title')
Maintainance Mode
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sigma-1/9.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        503
    </div>
    <div class="message" style="padding: 10px;">
        <h1 class="text-center title">We are currently down for maintenance</h1>
        <div class="text-center subtitle">We will be up in couple of hours. Thanks for patience</div>
    </div>
@endsection
