@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			
			<!--begin::Row-->
			<div class="row">
				<div class="col-lg-6">
                    
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Modify User Data</span>
								
							</h3>
							<div class="card-toolbar">
								<a href="/panel/admin/settings/users" class="btn btn-sm btn-primary font-weight-bolder font-size-sm mr-3"><i class="fas fa-reply"></i> Back</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
                            @if(session('success'))
                            <div class="alert alert-success" role="alert">
                            {{session('success')}}
                            </div>
                            @endif

                            @if(session('error'))
                            <div class="alert alert-warning" role="alert">
                                {{session('error')}}
                            </div>
                            @endif
                            <form method="post" action="{{route('panel.admin.update_user')}}">
                                    @csrf
                                    <div class="form-group row">
                                        <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>
                                        <div class="col-md-6">
                                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" readonly>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>
                                        <div class="col-md-6">
                                            <input id="name" type="name" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="username" class="col-md-4 col-form-label text-md-right">Username</label>
                                        <div class="col-md-6">
                                            <input id="name" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ $user->username }}" required autocomplete="name" autofocus>
                                            @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="name" class="col-md-4 col-form-label text-md-right">Password</label>
                                        <div class="col-md-6">
                                            <input id="password" type="text" class="form-control @error('name') is-invalid @enderror" name="password" placeholder="Leave blank if not changing" autocomplete="password" autofocus>
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="Roles" class="col-md-4 col-form-label text-md-right">Roles</label>
                                        <div class="col-md-6">
                                        @php 
                                            $show_logistics = 0;
                                        @endphp
                                        @foreach($roles as $role)
                                            <div class="form-check">
                                                <input type="checkbox" name="roles[]" id="user{{ $role->id }}" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <label for="">{{$role->name}}</label>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                        
                                    <div class="form-group row justify-content-center">
                                        <div class="col-md-6">
                                        <input type="hidden" name="user_id" value="{{$user->id}}">
                                        <button type="submit" class="btn btn-primary btn-sm"><i class="fas fa-save"></i> Update </button>
                                        </div>
                                    </div>
                                    
                                </form>
							</div>
						</div>
						<!--end::Body-->
					</div>
					<!--end::Advance Table Widget 4-->
				</div>
			</div>
			<!--end::Row-->
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection