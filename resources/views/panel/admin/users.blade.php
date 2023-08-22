@extends('layouts.panel')
@section('content')
<div class="content flex-row-fluid" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">				
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label font-weight-bolder text-dark">Users</span>
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.name')}} users listed here.</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-user" ><i class="fas fa-plus"></i> New User</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        {{$users->links('pagination::bootstrap-4')}}
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                            <thead>
                                <tr>
                                <th scope="col">#</th>
                                <th scope="col">Name</th>
                                <th scope="col">Username</th>
                                <th scope="col">Email</th>
                                <th scope="col">Roles </th>
                                <th scope="col">Status </th>
                                <th scope="col">Action</th>
                                </tr>
                            </thead>
                        
                            <tbody>
                                <?php 
                                    $count = 1; 
                                ?>
                                @foreach($users as $user)
                                <tr>
                                <th scope="row">{{$count}}</th>
                                <td>{{$user->name}}</td>
                                <td>{{$user->username}}</td>
                                <td>{{$user->email}}</td>
                                <td>
                                
                                @foreach($user->roles as $role)
                                    {{$role->name}} <br> 
                                @endforeach

                                </td>
                                <td >
                                    @if($user->status == 'active')   
                                    <span class="label label-inline label-light-success font-weight-bold">
                                    {{$user->status}}
                                    </span>
                                    @elseif($user->status == 'inactive')
                                    <span class="label label-inline label-light-danger font-weight-bold">
                                    {{$user->status}}
                                    </span>
                                    @else
                                    @endif
                                </td>
                                <td>
                                    
                                    <a href="/panel/admin/settings/users/{{$user->id}}" class="btn btn-primary btn-sm float-left" style="margin-right:3px;">
                                    <i class="fa fa-pen" style="font-size:10px;"></i>
                                    </a>
                                    
                                    @if($user->status == 'active')
                                        <a href="javascript:;" id="modifyuser{{$user->id}}" class="btn btn-sm btn-warning modify-user"
                                            data-user_id="{{$user->id}}"
                                            data-user_status="inactive">
                                            <i class="far fa-eye-slash" style="font-size:10px;"></i>
                                        </a>
                                        @elseif($user->status == 'inactive')
                                        <a href="javascript:;" id="modifyuser{{$user->id}}" class="btn btn-sm btn-info modify-user"
                                            data-user_id="{{$user->id}}"
                                            data-user_status="active">
                                            <i class="far fa-eye" style="font-size:10px;"></i>
                                        </a>
                                        @else
                                    @endif
                                    
                                </td>
                                </tr>
                                <?php 
                                    $count += 1; 
                                ?>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                    </div>
                </div>
                <!--end::Body-->
            </div>
            <!--end::Advance Table Widget 4-->
        </div>
    </div>
    <!--end::Row-->
</div>
<!--begin::Modal - Add User-->
<div class="modal fade" id="adduserModal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>New User</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5">
                <!--begin::Form-->
                <form method="post" id="add_user">
                    @csrf
                    <div class="errors"></div>
                    <div class="card-body">
                        <!--begin::Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Name</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="name" placeholder="Full Name" required>
                                        <span class="form-text text-muted">Please enter full name of the user</span>
                                    <div class="fv-plugins-message-container"></div></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Email</label>
                                        <input type="email" class="form-control form-control-lg form-control-solid" name="email" placeholder="mail@mail.com" required>
                                        <span class="form-text text-muted">Please enter email of the user</span>
                                    <div class="fv-plugins-message-container"></div></div>
                                </div>
                                
                            </div>
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Username</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="username" placeholder="username" required>
                                        <span class="form-text text-muted">Please enter unique username</span>
                                    <div class="fv-plugins-message-container"></div></div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Password</label>
                                        <input type="password" class="form-control form-control-lg form-control-solid" name="password" placeholder="password" required>
                                        <span class="form-text text-muted">Please enter password of the user</span>
                                    <div class="fv-plugins-message-container"></div></div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group">
                                        <label>Roles</label>
                                        <br>
                                        <div class="checkbox-inline">
                                            @foreach($roles as $role)
                                                @if($role->name != 'member_agent' && $role->name != 'member_admin' && $role->name != 'member_manager' && $role->name != 'member')
                                                <label class="checkbox">
                                                <input type="checkbox" class="roles" name="roles" value="{{ $role->id }}" @if($user->roles->pluck('id')->contains($role->id)) checked @endif>
                                                <span></span>{{$role->name}}</label>
                                                @endif
                                            @endforeach
                                        </div>
                                        <span class="form-text text-muted">Please check the roles you want to assign on the user</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end::Step 1-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-bs-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="adduser"> <i class=" fas fa-save"></i> Save</button>
                    </div>
                </form>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add User--->
<!--begin::Modal - Add User Success Modal-->
<div class="modal fade" id="adduserModalSuccess" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>New User</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15">
                <!--begin::Form-->
                <div class="alert alert-success" role="alert"> New user successfully added.</div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-warning btn-sm font-weight-bold closemodify" data-bs-dismiss="modal"> <i class=" fas fa-times"></i> Close</button>
                </div>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Add UserSuccess Modal--->
<!--begin::Modal - Modify User Success Modal-->
<div class="modal fade" id="modifyUserModal" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Modify User</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15">
                <!--begin::Form-->
                @csrf
                <input type="hidden" class="form-control" name="user_modify_id" id="user_modify_id">
                <input type="hidden" class="form-control" name="user_modify_status" id="user_modify_status">
                <div class="alert alert-danger" role="alert" id="modify-success"> 
                    Are you sure you want to modify this user to activate/deactivate?.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                    <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyuser"> <i class=" fas fa-check"></i> Modify</button>
                </div>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Modify User Success Modal--->
<!--begin::Modal - Modify User Success Modal-->
<div class="modal fade" id="modifyUserModalSuccess" tabindex="-1" aria-hidden="true">
    <!--begin::Modal dialog-->
    <div class="modal-dialog modal-dialog-centered mw-650px">
        <!--begin::Modal content-->
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header">
                <!--begin::Modal title-->
                <h2>Modify User</h2>
                <!--end::Modal title-->
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor" />
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--end::Modal header-->
            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-15">
                <!--begin::Form-->
                @csrf
                <div class="alert alert-success" role="alert" id="modify-success"> 
                    User successfully modified.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info btn-sm font-weight-bold closemodify"> <i class=" fas fa-times"></i> Close</button>
                </div>
                <!--end::Form-->
            </div>
            <!--end::Modal body-->
        </div>
        <!--end::Modal content-->
    </div>
    <!--end::Modal dialog-->
</div>
<!--end::Modal - Modify User Success Modal--->


<script src="{{asset('js/app.js')}}"></script>  
<script src="{{asset('js/users.js')}}"></script>
@endsection