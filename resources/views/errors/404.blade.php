@extends('errors::error-layout')
@section('title')
Not Found
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/18.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        404
    </div>
    <div class="message" style="padding: 10px;">
    Not Found, back <a href="/">click here.</a>
    </div>
@endsection