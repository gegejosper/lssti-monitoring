@extends('layouts.panel')

@section('content')
<?php 
$url ='#';
// function encodeURIComponentNew($str){
// $revert = array('%21'=>'!', '%2A'=>'*', '%27'=>"'", '%28'=>'(', '%29'=>')');
//     return strtr(rawurlencode($str), $revert);
// }
?>
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <!--begin::Layout-->
    <div class="d-flex flex-column flex-xl-row">
        <!--begin::Sidebar-->
        <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10 no-print">
            <!--begin::Card-->
            <div class="card mb-5 mb-xl-8">
                <!--begin::Card body-->
                <div class="card-body pt-15">
                    <!--begin::Summary-->
                    <div class="d-flex flex-center flex-column mb-5">
                        <!--begin::Avatar-->
                        <div class="mb-7 text-center">
                        <?php 
                            //$url = config('app.url').'/customers/qrcode/'.$customer->account_number.'/'.$customer->id;
                            
                            $qr_code = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=".$employee->id."&choe=UTF-8";
                            //echo '<a href="/customers/qrcode?url='.encodeURIComponentNew($qr_code).'" target="_blank">';
                    
                            // add the string in the Google Chart API URL
                            //$google_chart_api_url = "https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl=".$url."&choe=UTF-8";

                            // let's display the generated QR code
                            echo "<img src='".$qr_code."' alt='".$employee->id."'>";
                        ?>
                        
                        <br>
                        <a onclick="PrintImage('https://chart.googleapis.com/chart?chs=200x200&cht=qr&chl={{$employee->id}}&choe=UTF-8')" class="btn btn-xs btn-icon btn-primary mt-5" print><i class="fa fa-print"> </i></a> 
                        </div>
                        <!--end::Avatar-->
                        <!--begin::Name-->
                        <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bolder mb-1">{{$employee->lname}}, {{$employee->fname}} {{$employee->mname}}</a>
                        <!--end::Name-->
                        <!--begin::Position-->
                        <div class="fs-5 fw-bold text-muted mb-6">{{$employee->status}}</div>
                        <!--end::Position-->

                        
                        
                    </div>
                    <!--end::Summary-->
                    
                    <div class="separator separator-dashed my-3"></div>
                    <!--begin::Details content-->
                    <div id="kt_employee_view_details" class="collapse show no-print">
                        <div class="py-5 fs-6">
                            <!--begin::Badge-->
                            <div class="badge badge-light-info d-inline">{{ucfirst($employee->status)}} Account</div>
                            <div class="fw-bolder mt-5">ID Number</div>
                            <div class="text-gray-600">{{$employee->id_number}}</div>
                            <div class="fw-bolder mt-5">Position</div>
                            <div class="text-gray-600">{{$employee->position}}</div>
                        </div>
                    </div>
                    <!--end::Details content-->
                </div>
                <!--end::Card body-->
            </div>
            <!--end::Card-->
            
        </div>
        <!--end::Sidebar-->
        <!--begin::Content-->
        <div class="flex-lg-row-fluid ms-lg-15">
            <!--begin:::Tabs-->
            <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8 no-print">
                <!--begin:::Tab item-->
                <li class="nav-item">
                    <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_employee_view_overview_tab">Overview</a>
                </li>
                <!-- <li class="nav-item ms-auto">
                    <a href="#" class="btn btn-primary ps-7 text-black" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                    
                    <span class="svg-icon svg-icon-2 text-black me-0">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                        </svg>
                    </span></a>
                    <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
                        <div class="menu-item px-5">
                            <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                        </div>
                        <div class="menu-item px-5 my-1">
                            <a href="javascript:;" class="menu-link px-5 edit-employee"
                                data-employee_id="{{$employee->id}}"
                                data-employee_id_number="{{$employee->id}}"
                                data-employee_last_name="{{$employee->lname}}"
                                data-employee_first_name="{{$employee->fname}}"
                                data-employee_middle_name="{{$employee->mname}}"
                                data-employee_mobile_num="{{$employee->mobile_num}}"
                                data-employee_positions="{{$employee->position}}"
                            >Update Account</a>
                        </div>
                        
                    </div>
                </li> -->
            </ul>
            <!--end:::Tabs-->
            <!--begin:::Tab content-->
            <div class="tab-content" id="myTabContent">
                <!--begin:::Tab pane-->
                <div class="tab-pane fade active show" id="kt_employee_view_overview_tab" role="tabpanel">
                    <div class="text-center justify-content-center align-items-center mb-10">
                        <img alt="Logo" src="{{asset(config('app.logo'))}}" class="h-150px" />
                    </div>
                    <!--begin::Card-->
                    <div class="card pt-4 mb-6 mb-xl-9">
                        <!--begin::Card header-->
                        <div class="card-header border-0">
                            <!--begin::Card title-->
                            <div class="card-title">
                                <h2>History</h2>
                            </div>
                        </div>
                        <!--end::Card header-->
                        <!--begin::Card body-->
                        <div class="card-body pt-0 pb-5">
                            <!--begin::Table-->
                            <div id="kt_table_employees_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                <div class="table-responsive">
                                    <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="employeeTable">
                                        <thead>
                                            <tr class="text-left fw-bold text-uppercase">
                                                <th>Date</th>
                                                <th>ID Number</th>
                                                <th>
                                                    <span class="text-dark-75">Name</span>
                                                </th>
                                                <td>Time Out</td>
                                                <td>Time Back</td>
                                                <td>Time Consumed</td>
                                                <td>Purpose</td>
                                                <td>Penalty</td>
                                                <td>Status</td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($employee_logs as $employee_log)
                                                <?php
                                                if($employee_log->time_consumed != 'n/a'){
                                                $timeConsumed = $employee_log->time_consumed; // Assuming it's in seconds

                                                // Calculate hours, minutes, and seconds
                                                $hours = floor($timeConsumed / 3600);
                                                $minutes = floor(($timeConsumed % 3600) / 60);
                                                $seconds = $timeConsumed % 60;
                                                $time_consumed_in_words =$hours.' hours '.$minutes.' minutes'; 
                                                }else {
                                                    $time_consumed_in_words = 'n/a';
                                                }
                                                ?>
                                                <tr class="row{{$employee_log->employee_details->id}}">
                                                <td>{{$employee_log->created_at->format('Y-m-d')}}</td>
                                                <td>{{$employee_log->employee_details->id_number}}</td>
                                                <td>{{$employee_log->employee_details->lname}}, {{$employee_log->employee_details->fname}} {{$employee_log->employee_details->mname}}</a>
                                                </td>
                                                <td>{{$employee_log->time_out}}</td>
                                                <td id="row_time_back_{{$employee_log->id}}">{{$employee_log->time_back}}</td>
                                                <td id="row_time_consumed_{{$employee_log->id}}">{{$time_consumed_in_words}}</td>
                                                        
                                                <td>{{$employee_log->purpose}}</td>
                                                <td id="row_penalty_{{$employee_log->id}}">{{$employee_log->penalty_amount}}</td>
                                                <td id="row_status_{{$employee_log->id}}">{{$employee_log->status}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!--end::Table-->
                            </div>
                            <!--end::Card body-->
                            <button class="btn btn-primary mt-5 no-print" onclick="window.print();"><i class="fas fa-print"></i> Print</button>
                        </div>
                        <!--end::Card-->
                    
                    </div>
                </div>
                <!--end:::Tab pane-->
            </div>
            <!--end:::Tab content-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Layout-->
</div>
<script type="text/javascript">
  // print an image
  function ImagetoPrint(source){
    return "<html><head><script>function step1(){\n" +
           "setTimeout('step2()', 10);}\n" +
           "function step2(){window.print();window.close()}\n" +
           "</scri"+"pt></head><body onload='step1()'>\n" +
           "<img src='" + source + "'/></body></html>";  
  }

  function PrintImage(source){
     Pagelink = "about:blank";
     var pwa = window.open(Pagelink, "_new");
     pwa.document.open();
     pwa.document.write(ImagetoPrint(source));
     pwa.document.close();
  }
</script>
<script src="{{asset('js/app.js')}}"></script>  
<script src="{{asset('assets/js/employees.js')}}"></script>

@endsection
