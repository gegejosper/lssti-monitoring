@extends('layouts.panel')
@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">				
    <div class="row">
        <div class="col-lg-12">
            <!--begin::Advance Table Widget 4-->
            <div class="card card-custom card-stretch gutter-b">
                <!--begin::Header-->
                <div class="card-header border-0 py-5">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">Report for visitor logs.</span><br>  <br> 
                        @if(isset($from_date) && isset($to_date)) 
                        Date: {{$from_date->format('M-d-Y')}} -  {{$to_date->format('M-d-Y')}}
                        @endif
                    </h3>
                    <div class="d-flex align-items-center gap-2 gap-lg-3">
                    <!--begin::Filter menu-->
                    <div class="m-0">
                        <!--begin::Menu toggle-->
                        <a href="#" class="btn btn-sm btn-flex btn-light btn-active-primary fw-bolder" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
                        <!--begin::Svg Icon | path: icons/duotune/general/gen031.svg-->
                        <span class="svg-icon svg-icon-5 svg-icon-gray-500 me-1">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                <path d="M19.0759 3H4.72777C3.95892 3 3.47768 3.83148 3.86067 4.49814L8.56967 12.6949C9.17923 13.7559 9.5 14.9582 9.5 16.1819V19.5072C9.5 20.2189 10.2223 20.7028 10.8805 20.432L13.8805 19.1977C14.2553 19.0435 14.5 18.6783 14.5 18.273V13.8372C14.5 12.8089 14.8171 11.8056 15.408 10.964L19.8943 4.57465C20.3596 3.912 19.8856 3 19.0759 3Z" fill="currentColor"></path>
                            </svg>
                        </span>
                        <!--end::Svg Icon-->Filter</a>
                        <!--end::Menu toggle-->
                        <!--begin::Menu 1-->
                        <div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_6244760677ea6" style="">
                            <!--begin::Header-->
                            <div class="px-7 py-5">
                                <div class="fs-5 text-dark fw-bolder">Filter Options</div>
                            </div>
                            <!--end::Header-->
                            <!--begin::Menu separator-->
                            <div class="separator border-gray-200"></div>
                            <!--end::Menu separator-->
                            
                            <form action="{{route ('panel.admin.report_visitors_range')}}" method="post">
                                <!--begin::Form-->
                                @csrf
                                <div class="px-7 py-5">
                                    <!--begin::Input group-->
                                    <div class="mb-10">
                                        <!--begin::Label-->
                                        <label class="form-label fw-bold">From:</label>
                                        <input class="form-control form-control-solid" placeholder="From:" name="from_date" id="from_date" type="date" required>

                                        <label class="form-label fw-bold">To:</label>
                                        <input class="form-control form-control-solid" placeholder="To:" name="to_date" id="to_date" type="date" required>
                                        
                                    </div>
                                    <!--end::Input group-->
                                    <!--begin::Actions-->
                                    <div class="d-flex justify-content-end">
                                        <button type="reset" class="btn btn-sm btn-light btn-active-light-primary me-2" data-kt-menu-dismiss="true">Reset</button>
                                        <button type="submit" class="btn btn-sm btn-primary" data-kt-menu-dismiss="true">Apply</button>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--end::Form-->
                            </form>
                        </div>
                        <!--end::Menu 1-->
                    </div>
                
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
                                        <td>Date</td>
                                        <td>Time</td>
                                        <td>Name</td>
                                        <td>ID Type</td>
                                        <td>ID No.</td>
                                        <td>Contact #</td>
                                        <td>Address</td>
                                        <td>Purpose</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($visitors as $visitor)
                                        <tr>
                                            <td>{{$visitor->date_visit}}</td>
                                            <td>{{$visitor->time_visit}}</td>
                                            <td>{{$visitor->lname}}, {{$visitor->fname}}</td>
                                            <td>{{$visitor->id_type}}</td>
                                            <td>{{$visitor->id_number}}</td>
                                            <td>{{$visitor->contact_number}}</td>
                                            <td>{{$visitor->address}}</td>
                                            <td>{{$visitor->purpose}}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <!--end::Table-->
                        <button class="btn btn-primary mt-5 no-print" onclick="window.print();"><i class="fas fa-print"></i> Print</button>
                    </div>
                </div>
                <!--end::Body-->
            </div>
        </div>
		<!--end::Container-->
    </div>
	<!--end::Entry-->
</div>
@endsection