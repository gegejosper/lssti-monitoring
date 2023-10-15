@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
			<div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Report for employees logs listed here.</span>
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
			<!--end::Dashboard-->
		</div>
		<!--end::Container-->
	</div>
	<!--end::Entry-->
</div>
@endsection