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
				<div class="col-lg-12">
				
					@if(session('success'))
				        <div class="alert alert-success" role="alert">
				            {{ session('success') }}     
				        </div>
				    @endif
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Settings</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">{{config('app.name')}} Application Setups.</span>
							</h3>
							
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<form class="form" action="" method="post">
								@csrf
								<div class="card-body">
								
									<div class="form-group row">
										<div class="col-lg-6">
											<h4>SMS Message Template</h4>
											
												@csrf
												
													<div class="form-group row">
														<div class="col-lg-12">
															<label>Message:</label>
															<textarea name="message" id="message" cols="20" rows="10" class="form-control" >{{$settings->sms_message}}
															</textarea>
															<span class="form-text text-muted">Message update</span>
														</div>
														
													</div>
													
										</div>
									</div>
								</div>
								<div class="card-footer">
									<div class="row">
										
										<div class="col-lg-12 text-center">
											<button type="submit" class="btn btn-primary mr-2"><i class="fas fa-save"></i> Save</button>
										</div>
									</div>
								</div>
							</form>
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