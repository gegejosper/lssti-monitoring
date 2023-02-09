@extends('auth.layout')
@section('auth-content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
    <!--begin::Content-->
    <div class="d-flex flex-center flex-column flex-column-fluid">
        <!--begin::Wrapper-->
        <div class="w-lg-500px p-10 p-lg-15 mx-auto">
            <!--begin::Form-->
             @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <form class="form w-100" novalidate="novalidate" id="kt_password_reset_form" method="POST" action="{{ route('password.email') }}">
            @csrf
                <!--begin::Heading-->
                <div class="text-center mb-10">
                    <!--begin::Title-->
                    <h1 class="text-dark mb-3">Forgot Password ?</h1>
                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>
                    <!--end::Title-->
                   
                </div>
                <!--begin::Heading-->
                <!--begin::Input group-->
                <div class="fv-row mb-10">
                    <label class="form-label fw-bolder text-gray-900 fs-6">Email</label>
                    <input class="form-control form-control-solid" type="email" placeholder="" name="email" :value="old('email')" autocomplete="off" autofocus />
                </div>
                <!--end::Input group-->
                <!--begin::Actions-->
                <div class="d-flex flex-wrap justify-content-center pb-lg-0">
                    <button type="submit" id="kt_password_reset_submit" class="btn btn-lg btn-primary fw-bolder me-4">
                        <span class="indicator-label">Submit</span>
                        <span class="indicator-progress">Please wait...
                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                    <a href="{{route('login')}}" class="btn btn-lg btn-light-primary fw-bolder">Cancel</a>
                </div>
                <!--end::Actions-->
            </form>
            <!--end::Form-->
        </div>
        <!--end::Wrapper-->
    </div>
    <!--end::Content-->
    <!--begin::Footer-->
    <div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
        <!--begin::Links-->
        <div class="d-flex flex-center fw-bold fs-6">
			<a href="https://azway.ph" class="text-muted text-hover-primary px-2" target="_blank">2022 @ AZWay.ph</a>
		</div>
        <!--end::Links-->
    </div>
    <!--end::Footer-->
</div>
@endsection
