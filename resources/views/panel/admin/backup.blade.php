@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
	<!--begin::Entry-->
	<div class="d-flex flex-column-fluid">
		<!--begin::Container-->
		<div class="container">
			<!--begin::Dashboard-->
			<div class="row">
                <div class="col-lg-6">
					<!--begin::Advance Table Widget 4-->
					<div class="card card-custom card-stretch gutter-b">
						<!--begin::Header-->
						<div class="card-header border-0 py-5">
							<h3 class="card-title align-items-start flex-column">
								<span class="card-label font-weight-bolder text-dark">Tables to Backup</span>
								<span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.name')}} to be backup listed here.</span>
							</h3>
						</div>
						<!--end::Header-->
						<!--begin::Body-->
						<div class="card-body pt-0 pb-3">
							<div class="tab-content">
								<!--begin::Table-->
								<div class="table-responsive">
									<table class="table table-head-custom table-head-bg table-borderless table-vertical-center">
                                        <thead>
                                            <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col" style="width:100px; align-text:center">Action</th>
                                            </tr>
                                        </thead>
                                    
                                        <tbody>
                                            <tr>
                                            
                                            <td>Users</td>
                                            <td>
                                                <span class="btn btn-primary btn-sm float-left edit-role" style="margin-right:3px;" 
                                                    data-href="/panel/admin/settings/backup/users"
                                                    onclick ="exportTasks(this);" 
                                                    >
                                                <i class="fa fa-download" style="font-size:10px;"></i>
                                                </span>
                                            </td>
                                            </tr>
                                          
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
<script>
   function exportTasks(e) {
      let _url = e.getAttribute('data-href');
      console.log(_url);
      window.location.href = _url;
   }
</script>
@endsection