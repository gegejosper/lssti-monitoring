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
								<span class="card-label font-weight-bolder text-dark">Department</span>
							</h3>
							<div class="card-toolbar">
								<a href="javascript:;" class="btn btn-primary font-weight-bolder font-size-sm mr-3 add-department" data-toggle="modal"><i class="fas fa-plus"></i> New Department</a>
							</div>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="departmentTable">
										<thead>
											<tr class="text-left text-uppercase">
												<th style="" class="pl-7">
													<span class="text-dark-75">Name</span>
												</th>
                                                <th style="min-width: 100px">Code</th>
												<th style="min-width: 100px">Status</th>
												<th style="min-width: 80px">Action</th>
											</tr>
										</thead>
										<tbody>
											@foreach($departments as $department)
											<tr class="row{{$department->id}}">
												<td>
													<strong>{{$department->department_name}}</strong>
												</td>
												<td>{{$department->department_code}}</td>
												<td>
													<span class="text-dark-75 font-weight-bolder d-block font-size-lg">{{$department->status}}</span>
													
												</td>
												
												<td class="pr-0">
                                                <!-- <a href="#" class="btn btn-light-success font-weight-bolder font-size-sm"><i class="fas fa-search"></i></a> -->
												<a href="javascript:;" class="btn btn-light-warning font-weight-bolder font-size-sm edit-department"
													data-department_id="{{$department->id}}"
													data-department_name="{{$department->department_name}}"
                                                    data-department_code="{{$department->department_code}}"
												><i class="fas fa-pen"></i></a>
												@if($department->status == 'active')
                                                <a href="javascript:;" id="modifydepartment{{$department->id}}" class="btn btn-sm btn-warning modify-department"
                                                    data-department_id="{{$department->id}}"
                                                    data-department_status="inactive">
                                                    <i class="far fa-eye-slash"></i>
                                                </a>
                                                @elseif($department->status == 'inactive')
                                                <a href="javascript:;" id="modifydepartment{{$department->id}}" class="btn btn-sm btn-info modify-department"
                                                    data-department_id="{{$department->id}}"
                                                    data-department_status="active">
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
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
<!-- Modal-->
<div class="modal fade" id="addDepartmentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Department</h5>
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
                <div class="card-body">
					<div class="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Department</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Department name" name="department_name" id="department_name">
                                <span class="form-text text-muted">Please enter department name</span>
                            </div>
                        </div>
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-3 col-form-label">Department Code</label>
                            <div class="col-lg-9">
                                <input type="text" class="form-control" placeholder="Department code" name="department_code" id="department_code">
                                <span class="form-text text-muted">Please enter department code</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-primary btn-sm font-weight-bold" id="addDepartment"> <i class=" fas fa-save"></i> Save</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editDepartmentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Department</h5>
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
                <div class="card-body">
                    <div class="">
						<div class="form-group row">
                            <label class="col-lg-2 col-form-label">Department</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="" name="edit_department_name" id="edit_department_name">
                                <span class="form-text text-muted">Please enter department name</span>
                            </div>
                        </div>
                        
                    </div>
                    <div class="">
                        <div class="form-group row">
                            <label class="col-lg-2 col-form-label">Department Code</label>
                            <div class="col-lg-10">
                                <input type="text" class="form-control" placeholder="Department code" name="edit_department_code" id="edit_department_code">
                                <span class="form-text text-muted">Please enter department code</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="edit_department_id" id="edit_department_id">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="editDepartment"> <i class=" fas fa-save"></i> Update</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyDepartmentModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Department</h5>
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
                <div class="alert alert-danger" role="alert"> Are you sure you want activate/deactivate this department?</div>
            </div>
            <div class="modal-footer">
            <input type="hidden" class="form-control" name="department_modify_id" id="department_modify_id">
            <input type="hidden" class="form-control" name="department_modify_status" id="department_modify_status">
                <button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-dismiss="modal"> <i class=" fas fa-times"></i> Cancel</button>
                <button type="button" class="btn btn-success btn-sm font-weight-bold" id="modifyDepartment"> <i class=" fas fa-check"></i> Modify</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modifyDepartmentModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modify Department</h5>
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
                <div class="alert alert-success" role="alert"> Department modified</div>
            </div>
            <div class="modal-footer">
           
                <button type="button" class="btn btn-light-success btn-sm font-weight-bold closemodify" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('js/departments.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection

