@extends('auth.layout')
@section('auth-content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	@can('manage-guard')
	<div class="d-flex flex-center ">
		<!--begin::Wrapper-->
		<div class="w-lg-650px p-10 p-lg-15" style="background:#E92404; border-radius:15px;">
			<div class="row">
				<div class="col-lg-6">
					<a href="javascript:;" id="search_employee_modal" class="btn btn-lg btn-warning w-100 mb-5">
						<!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com006.svg-->
						<span class="svg-icon svg-icon-warning svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path opacity="0.3" d="M22 12C22 17.5 17.5 22 12 22C6.5 22 2 17.5 2 12C2 6.5 6.5 2 12 2C17.5 2 22 6.5 22 12ZM12 7C10.3 7 9 8.3 9 10C9 11.7 10.3 13 12 13C13.7 13 15 11.7 15 10C15 8.3 13.7 7 12 7Z" fill="currentColor"/>
						<path d="M12 22C14.6 22 17 21 18.7 19.4C17.9 16.9 15.2 15 12 15C8.8 15 6.09999 16.9 5.29999 19.4C6.99999 21 9.4 22 12 22Z" fill="currentColor"/>
						</svg></span> Scan Employee
						<!--end::Svg Icon-->
					</a>
				</div>
				<div class="col-lg-6">
					<a href="javascript:;" id="visitor_logbook" class="btn btn-lg btn-warning w-100 mb-5">
						<!--begin::Svg Icon | path: assets/media/icons/duotune/communication/com005.svg-->
						<span class="svg-icon svg-icon-muted svg-icon-2hx"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
						<path d="M20 14H18V10H20C20.6 10 21 10.4 21 11V13C21 13.6 20.6 14 20 14ZM21 19V17C21 16.4 20.6 16 20 16H18V20H20C20.6 20 21 19.6 21 19ZM21 7V5C21 4.4 20.6 4 20 4H18V8H20C20.6 8 21 7.6 21 7Z" fill="currentColor"/>
						<path opacity="0.3" d="M17 22H3C2.4 22 2 21.6 2 21V3C2 2.4 2.4 2 3 2H17C17.6 2 18 2.4 18 3V21C18 21.6 17.6 22 17 22ZM10 7C8.9 7 8 7.9 8 9C8 10.1 8.9 11 10 11C11.1 11 12 10.1 12 9C12 7.9 11.1 7 10 7ZM13.3 16C14 16 14.5 15.3 14.3 14.7C13.7 13.2 12 12 10.1 12C8.10001 12 6.49999 13.1 5.89999 14.7C5.59999 15.3 6.19999 16 7.39999 16H13.3Z" fill="currentColor"/>
						</svg></span>
						<!--end::Svg Icon--> Visitors Log
					</a>
				</div>
			</div>
					
					
		</div>
		<!--end::Wrapper-->
	</div>
	<!--end::Content-->
	@endcan
	<div class="d-flex flex-center mt-10">
			
	</div>
	<div class="row mx-10">
		<div class="col-lg-12">
			<ul class="nav nav-tabs" id="myTab" role="tablist">
				<li class="nav-item" role="presentation">
					<button class="nav-link active text-danger" id="visitors-tab" data-bs-toggle="tab" data-bs-target="#visitors" type="button" role="tab" aria-controls="home" aria-selected="true">Visitors Log</button>
				</li>
				<li class="nav-item" role="presentation">
					<button class="nav-link text-danger" id="employee-tab" data-bs-toggle="tab" data-bs-target="#employees" type="button" role="tab" aria-controls="profile" aria-selected="false">Employees Log</button>
				</li>
			
			</ul>
			<div class="tab-content" id="myTabContent">
				<div class="tab-pane fade show active py-10 px-5" id="visitors" role="tabpanel" aria-labelledby="visitors-tab">
					<h5>Visitor's Log</h5>
					<table class="table table-bordered">
						<thead>
						<tr>
							<td>Time</td>
							<td>Name</td>
							<td>Contact #</td>
							<td>Address</td>
							<td>Purpose</td>
						</tr>
						</thead>
						
						<tbody id="visitors-table">
							@foreach($visitors as $visitor)
							<tr>
								<td>{{$visitor->time_visit}}</td>
								<td>{{$visitor->lname}}, {{$visitor->fname}}</td>
								<td>{{$visitor->contact_number}}</td>
								<td>{{$visitor->address}}</td>
								<td>{{$visitor->purpose}}</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
				<div class="tab-pane fade active py-10 px-5" id="employees" role="tabpanel" aria-labelledby="employees-tab">
				<h3>Employee's Log</h3>
					<table class="table table-bordered">
						<thead>
						<tr>
							<td>Time Out</td>
							<td>Time Back</td>
							<td>Time Consumed</td>
							
							<td>Name</td>
							<td>Purpose</td>
							<td>Penalty</td>
							<td>Status</td>
							<td></td>
						</tr>
						</thead>
						
						<tbody id="employees-table">
							@foreach($employees_log as $log)
							<?php
							if($log->time_consumed != 'n/a'){
							$timeConsumed = $log->time_consumed; // Assuming it's in seconds

							// Calculate hours, minutes, and seconds
							$hours = floor($timeConsumed / 3600);
							$minutes = floor(($timeConsumed % 3600) / 60);
							$seconds = $timeConsumed % 60;
							$time_consumed_in_words =$hours.' hours '.$minutes.' minutes '.$seconds.' seconds'; 
							}else {
								$time_consumed_in_words = 'n/a';
							}
							?>
							<tr>
								<td>{{$log->time_out}}</td>
								<td id="row_time_back_{{$log->id}}">{{$log->time_back}}</td>
								<td id="row_time_consumed_{{$log->id}}">{{$time_consumed_in_words}}</td>
								<td>{{$log->employee_details->lname}}, {{$log->employee_details->fname}}</td>
								<td>{{$log->purpose}}</td>
								<td id="row_penalty_{{$log->id}}">{{$log->penalty_amount}}</td>
								<td id="row_status_{{$log->id}}">{{$log->status}}</td>
								<td id="row_action_{{$log->id}}">
								@can('manage-guard')
									@if($log->status != 'returned')
										<a href="javascript:;" 
											class="btn btn-icon btn-primary return_employee"
											data-log_id="{{$log->id}}"
											data-penalty_amount="{{$setting->penalty}}"
											data-hour_limit="{{$setting->hours}}"
											><i class="fa fa-reply"></i></a>
									@endif
								@endcan
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
					<em>Penalty amounting {{$setting->penalty}} pesos when the employee will not return in the next {{$setting->hours}} hour(s) from time out recorded.</em>
				</div>

			</div>
		</div>
		<div class="col-lg-6">
			
			
		</div>
		<div class="col-lg-6">

			
		</div>
	</div>	
	<!--begin::Footer-->
	<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
		<!--begin::Links-->
		<div class="d-flex flex-center fw-bold fs-6">
			<a href="https://azway.ph" class="text-muted text-hover-primary px-2" target="_blank">2023 @ BSCS IV</a> 
			@auth
			<a href="{{ route('logout') }}"  
            onclick="event.preventDefault();
            document.getElementById('logout-form').submit();"
            id="signoutbtn">LOGOUT</a></h1>
    
			<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
				@csrf
			</form>
			@else
			<a href="/login" >LOGIN</a>
			@endauth
		</div>
		<!--end::Links-->
	</div>
	<!--end::Footer-->
</div>
<div class="modal fade" tabindex="-1" id="employeeModalSearch">
    <div class="modal-dialog mw-650px mx-300px">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Employee Scan</h5>
               <!--begin::Close-->
			   <div class="btn btn-icon btn-sm btn-active-light-danger text-dark ms-2 close_btn" data-bs-dismiss="modal" aria-label="Close">
                    <i class="fa fa-times"></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
				<div id="reader" width="600px"></div>
				@csrf
				
				<div style="max-height:500px; overflow:scroll">
					<table class="table table-hover table-striped table-row-dashed gx-7">
						<thead>
							<tr class="fw-semibold fs-6 text-gray-800 border-bottom border-gray-200">
								<th>ID Number</th>
								<th>Name</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody class="employees-list">
						
						</tbody>
						
					</table>
				</div>
                
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light close_btn" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="employeeLogModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Log</h5>
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
			<form method="post" id="employees_log_form">
				<div class="modal-body scroll-y mx-5 mx-xl-15 mt-7">
					@csrf
					<div class="errors"></div>
					<div class="card-body">
						<div class="form-group row mb-5">
							<div class="col-lg-6">
							<label class="col-form-label">ID #:</label>
								<input type="text" name="employee_id_number" id="employee_id_number" class="form-control form-control-solid" readonly>
							</div>
							
							<div class="col-lg-6">
							<label class="col-form-label">Name:</label>
								<input type="text" name="employee_name" id="employee_name" class="form-control form-control-solid" readonly>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">Purpose:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control form-control-solid" placeholder="Purpose" name="employee_purpose" id="employee_purpose" required>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="employee_id" id="employee_id">
					<button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-bs-dismiss="modal" aria-label="Close"> <i class=" fas fa-times"></i> Cancel</button>
					<button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="save_employee_log"> <i class=" fas fa-save"></i> Save</button>
				</div>
			</form>
        </div>
    </div>
</div>
<div class="modal fade" id="visitorsLogModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Record</h5>
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
			<form method="post" id="visitors_log_form">
				<div class="modal-body scroll-y mx-5 mx-xl-15 mt-7">
					@csrf
					<div class="errors"></div>
					<div class="card-body">
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">First Name:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control form-control-solid" placeholder="Visitors first name " name="visitors_fname" id="visitors_fname" required>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">Last Name:</label>
							<div class="col-lg-9">
								<input type="text" name="visitors_lname" id="visitors_lname" class="form-control form-control-solid" placeholder="Visitors last name" required>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">Contact Number:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control form-control-solid" placeholder="Contact Number" name="contact_number" id="contact_number" required>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">Address:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control form-control-solid" placeholder="Address" name="address" id="address" required>
							</div>
						</div>
						<div class="form-group row mb-5">
							<label class="col-lg-3 col-form-label">Purpose:</label>
							<div class="col-lg-9">
								<input type="text" class="form-control form-control-solid" placeholder="Purpose" name="purpose" id="purpose" required>
							</div>
						</div>
						
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-light-warning btn-sm font-weight-bold" data-bs-dismiss="modal" aria-label="Close"> <i class=" fas fa-times"></i> Cancel</button>
					<button type="submit" class="btn btn-primary btn-sm font-weight-bold" id="save_record"> <i class=" fas fa-save"></i> Save</button>
				</div>
			</form>
        </div>
    </div>
</div>
<script src="{{asset('js/qrcode.min.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
@endsection