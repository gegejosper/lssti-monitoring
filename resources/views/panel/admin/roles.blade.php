@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
	<!--begin::Toolbar-->
	<!--end::Toolbar-->
	<!--begin::Post-->
	<div class="post d-flex flex-column-fluid" id="kt_post">
		<!--begin::Container-->
		<div id="kt_content_container" class="container-xxl">
            <!--begin::Row-->
            <div class="row">
                <div class="col-lg-6">
                    <!--begin::Advance Table Widget 4-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header border-0 py-5">
                            <h3 class="card-title align-items-start flex-column">
                                <span class="card-label font-weight-bolder text-dark">Roles</span>
                                <span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.name')}} roles listed here.</span>
                            </h3>
                            <div class="card-toolbar">
                                <a href="javascript:;" class="btn btn-sm btn-primary font-weight-bolder font-size-sm mr-3 add-role"><i class="fas fa-plus"></i> New</a>
                            </div>
                        </div>
                        <!--end::Header-->
                        <!--begin::Body-->
                        <div class="card-body pt-0 pb-3">
                            <div class="tab-content">
                                <!--begin::Table-->
                                <div class="table-responsive">
                                    <table class="table table-row-bordered">
                                        <thead>
                                            <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <?php 
                                                $count = 1; 
                                            ?>
                                            @foreach($roles as $role)
                                            <tr>
                                            <th scope="row">{{$count}}</th>
                                            <td>{{$role->name}}</td>
                                            <td>
                                                <a href="javascript:;" class="btn btn-primary btn-sm float-left edit-role" style="margin-right:3px;">
                                                <i class="fa fa-pen" style="font-size:10px;"></i>
                                                </a>
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
		<!--end::Container-->
	</div>
	<!--end::Post-->
</div>

<div class="modal fade" id="addRoleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered mw-650px" role="document">
        
        <div class="modal-content">
            <!--begin::Modal header-->
            <div class="modal-header pb-0 border-0 justify-content-end">
                <!--begin::Close-->
                <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr061.svg-->
                    <span class="svg-icon svg-icon-1">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </div>
                <!--end::Close-->
            </div>
            <!--begin::Modal header-->

            <!--begin::Modal body-->
            <div class="modal-body scroll-y mx-5 mx-xl-18 pt-0 pb-15">
                <div class="mb-13 text-center">
                    <!--begin::Title-->
                    <h1 class="mb-3">Roles</h1>
                    <!--end::Title-->
                </div>
                <form method="post" id="add_user">
                    @csrf
                    <div class="errors"></div>
                    <div class="card-body">
                        <!--begin::Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label class="d-flex align-items-center fs-6 fw-bold mb-2">Role</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="role" placeholder="Role Name" required>
                                        <span class="form-text text-muted">Please enter unique role it should be lowercase.</span>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--end::Step 1-->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                        <button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="adduser"> <i class=" fas fa-save"></i> Save</button>
                    </div>
                </form>
            </div>
            <!--end::Modal body-->
        </div>
    </div>
</div>
<div class="modal fade" id="modifyRoleModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Role</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i aria-hidden="true" class="ki ki-close"></i>
                </button>
            </div>
            <div class="modal-body">
            <form method="post" id="add_user">
                    @csrf
                    <div class="errors"></div>
                    <div class="card-body">
                        <!--begin::Step 1-->
                        <div class="pb-5" data-wizard-type="step-content" data-wizard-state="current">
                            <div class="row">
                                <div class="col-xl-12">
                                    <div class="form-group fv-plugins-icon-container">
                                        <label>Role</label>
                                        <input type="text" class="form-control form-control-lg form-control-solid" name="role" placeholder="role name" required>
                                        <span class="form-text text-muted">Please enter unique role</span>
                                        <div class="fv-plugins-message-container"></div>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                        <!--end::Step 1-->
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                    <button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="adduser"> <i class=" fas fa-save"></i> Save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="{{asset('js/app.js')}}"></script>  
<script src="{{asset('js/roles.js')}}"></script>
@endsection