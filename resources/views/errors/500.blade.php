
@extends('errors::error-layout')
@section('title')
Server Error
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/20.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        500
    </div>
    <div class="message" style="padding: 10px;">
    Server Error, back <a href="/">click here.</a>
    </div>
@endsection