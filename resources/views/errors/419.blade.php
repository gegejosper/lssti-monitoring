@extends('errors::error-layout')
@section('title')
Page Expired
@endsection
@section('content')
<img src="{{asset('assets/media/illustrations/sketchy-1/5.png')}}" alt="" class="mw-100 mb-10 h-lg-450px" />
    <div class="code">
        419
    </div>
    <div class="message" style="padding: 10px;">
        Page expired, please <a href="/login">re-login.</a>
    </div>
@endsection