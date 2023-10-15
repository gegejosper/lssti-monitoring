@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
    <!--begin::Row-->
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <!-- <span class="card-label font-weight-bolder text-dark">Employees</span> -->
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.abbr')}} employees listed here.</span>
                    </h3>
                    <div class="card-toolbar">
                        <a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-employee" data-toggle="modal"><i class="fas fa-plus"></i> New Employee</a>
                    </div>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="employeeTable">
                                <thead>
                                    <tr class="text-left text-uppercase">
                                        <th>ID Number</th>
                                        <th>
                                            <span class="text-dark-75">Name</span>
                                        </th>
                                        <th style="min-width: 100px">Position</th>
                                        <th style="min-width: 100px">Department</th>
                                        <th style="min-width: 100px">Status</th>
                                        <th style="min-width: 80px"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($employees as $employee)
                                    <tr class="row{{$employee->id}}">
                                        <td>{{$employee->id_number}}</td>
                                        <td>
                                            <a href="/panel/admin/employees/{{$employee->id}}" class="text-dark-75 font-weight-bolder text-hover-primary mb-1 font-size-lg">{{$employee->lname}}, {{$employee->fname}} {{$employee->mname}}</a>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$employee->position}}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$employee->department}}</span>
                                        </td>
                                        <td>
                                            <span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$employee->status}}</span>
                                            
                                        </td>
                                        
                                        <td class="pr-0 text-right">
                                            <a href="/panel/admin/employees/{{$employee->id}}" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a>
                                        <a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-employee"
                                            data-employee_id="{{$employee->id}}"
                                            data-employee_id_number="{{$employee->id_number}}"
                                            data-employee_mname="{{$employee->mname}}"
                                            data-employee_fname="{{$employee->fname}}"
                                            data-employee_lname="{{$employee->lname}}"
                                            data-employee_position="{{$employee->position}}"
                                        ><i class="fas fa-pen"></i></a>
                                        @if($employee->status == 'active')
                                        <a href="javascript:;" id="modifyemployee{{$employee->id}}" class="btn btn-sm btn-warning modify-employee"
                                            data-employee_id="{{$employee->id}}"
                                            data-employee_status="inactive">
                                            <i class="far fa-eye-slash"></i>
                                        </a>
                                        @elseif($employee->status == 'inactive')
                                        <a href="javascript:;" id="modifybank{{$employee->id}}" class="btn btn-sm btn-info modify-employee"
                                            data-employee_id="{{$employee->id}}"
                                            data-employee_status="active">
                                            <i class="far fa-eye"></i>
                                        </a>
                                        @else
                                        @endif
                                        </td>
                                    </tr>
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
<!-- Modal-->
<div class="modal fade" id="addEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Employee</h5>
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 mt-7">
                @csrf
                <div class="errors"></div>
                <form id="addEmployeeForm">
                    <div class="card-body">
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">ID Number:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee ID Number " name="employee_id_number" id="employee_id_number" required>
                                
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">First Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee first name " name="employee_fname" id="employee_fname" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">Middle Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee middle name " name="employee_mname" id="employee_mname" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">Last Name:</label>
                            <div class="col-lg-9">
                                <input type="text" name="employee_lname" id="employee_lname" class="form-control form-control-solid" placeholder="Employee last name" required>
                            </div>
                        </div>
                        <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">Department:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee's Department" name="employee_department" id="employee_department" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Position:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee's Position" name="employee_position" id="employee_position" required>
                            </div>
                        </div>
                        
                    </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-bs-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="addEmployee"> <i class=" fas fa-save"></i> Save</button>
            </div>
            </form>
        </div>
    </div>
</div>
<div class="modal fade" id="editEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Employee</h5>
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
            <div class="modal-body scroll-y mx-5 mx-xl-15 mt-7 ">
                @csrf
                <div class="errors"></div>
                <div class="card-body p-0">
                    <div class="form-group row mb-5">
                        <label class="col-lg-3 col-form-label">ID Number:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-solid" placeholder="Employee ID Number " name="edit_employee_id_number" id="edit_employee_id_number">
                            
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <label class="col-lg-3 col-form-label">First Name:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-solid" placeholder="Employee first name" name="edit_employee_fname" id="edit_employee_fname">
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                            <label class="col-lg-3 col-form-label">Middle Name:</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control form-control-solid" placeholder="Employee middle name " name="edit_employee_mname" id="edit_employee_mname">
                            </div>
                        </div>
                    <div class="form-group row mb-5">
                        <label class="col-lg-3 col-form-label">Last Name:</label>
                        <div class="col-lg-9">
                            <input type="text" name="edit_employee_lname" id="edit_employee_lname" placeholder="Employee last name" class="form-control form-control-solid">
                        </div>
                    </div>
                    <div class="form-group row mb-5">
                        <label class="col-lg-3 col-form-label">Department:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-solid" placeholder="Employee's Department" name="edit_employee_department" id="edit_employee_department" >
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-lg-3 col-form-label">Position:</label>
                        <div class="col-lg-9">
                            <input type="text" class="form-control form-control-solid" name="edit_employee_position" id="edit_employee_position">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_employee_id" id="edit_employee_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editEmployee"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEmployeeModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Employee</h5>
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
            <div class="modal-body">
                @csrf
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this employee?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="employee_modify_id" id="employee_modify_id">
            <input type="hidden" class="form-control" name="employee_modify_status" id="employee_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-bs-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyEmployee"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyEmployeeModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Employee</h5>
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
            <div class="modal-body">
                <div class="alert alert-success" role="alert"> Employee modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-bs-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/employees.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection

