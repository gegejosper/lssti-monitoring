@extends('auth.layout')
@section('auth-content')
<div class="d-flex flex-column flex-lg-row-fluid py-10">
	<!--begin::Content-->
	<div class="d-flex flex-center flex-column flex-column-fluid">
		<!--begin::Wrapper-->
		<div class="w-lg-650px p-10 p-lg-15 mx-auto" style="background:#E92404; border-radius:15px;">
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
	<!--begin::Footer-->
	<div class="d-flex flex-center flex-wrap fs-6 p-5 pb-0">
		<!--begin::Links-->
		<div class="d-flex flex-center fw-bold fs-6">
			<a href="https://azway.ph" class="text-muted text-hover-primary px-2" target="_blank">2023 @ BSCS IV</a>
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
								<th>Position</th>
								<th></th>
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
<script src="{{asset('js/qrcode.min.js')}}"></script>
<script src="{{asset('js/index.js')}}"></script>
@endsection