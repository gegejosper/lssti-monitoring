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
                        <span class="text-muted mt-3 font-weight-bold font-size-sm">List of {{config('app.abbr')}} visitors listed here.</span>
                    </h3>
                </div>
                <!--end::Header-->
                <!--begin::Body-->
                <div class="card-body pt-0 pb-3">
                    <div class="tab-content">
                        <!--begin::Table-->
                        <div class="table-responsive">
                            <table class="table table-head-custom table-head-bg table-borderless table-vertical-center" id="visitorTable">
                                <thead>
                                    <tr class="text-uppercase">
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Address</th>
                                        <th>Purpose</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($visitors as $visitor)
                                    <tr>
                                        <td>{{$visitor->date_visit}}</td>
                                        <td>{{$visitor->lname}}, {{$visitor->fname}} {{$visitor->mname}}</td>
                                        <td>{{$visitor->address}}</td>
                                        <td>{{$visitor->purpose}}</td>
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

<script src="{{asset('js/visitors.js')}}"></script>
<script src="{{asset('js/app.js')}}"></script>  
@endsection

