@extends('layouts.panel')

@section('content')
<div class="content d-flex flex-column flex-column-fluid" id="kt_content">
    <div class="post d-flex flex-column-fluid" id="kt_post">
        <!--begin::Container-->
        <div id="kt_content_container" class="container-xxl">
            <!--begin::Layout-->
            <div class="d-flex flex-column flex-xl-row">
                <!--begin::Sidebar-->
                <div class="flex-column flex-lg-row-auto w-100 w-xl-350px mb-10">
                    <!--begin::Card-->
                    <div class="card mb-5 mb-xl-8">
                        <!--begin::Card body-->
                        <div class="card-body pt-15">
                            <!--begin::Summary-->
                            <div class="d-flex flex-center flex-column mb-5">
                                <!--begin::Avatar-->
                                <div class="mb-7 text-center">
                               
                                <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($employee->id)) !!} " class="img-thumbnail">
                                <br>
                                <a onclick="PrintImage('data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(200)->generate($employee->id)) !!} ')" class="btn btn-xs btn-icon btn-primary mt-5" print><i class="fa fa-print"> </i></a> 
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
                            <div id="kt_employee_view_details" class="collapse show">
                                <div class="py-5 fs-6">
                                    <!--begin::Badge-->
                                    <div class="badge badge-light-info d-inline">{{ucfirst($employee->status)}} Account</div>
                                    <div class="fw-bolder mt-5">ID Number</div>
                                    <div class="text-gray-600">{{$employee->id_number}}</div>
                                    <div class="fw-bolder mt-5">Position</div>
                                    <div class="text-gray-600">{{$employee->position}}</div>
                                    <div class="fw-bolder mt-5">Contact #</div>
                                    <div class="text-gray-600">{{$employee->mobile_num}}</div>
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
                    <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x border-0 fs-4 fw-bold mb-8">
                        <!--begin:::Tab item-->
                        <li class="nav-item">
                            <a class="nav-link text-active-primary pb-4 active" data-bs-toggle="tab" href="#kt_employee_view_overview_tab">Overview</a>
                        </li>
                        <!--end:::Tab item-->
                       
                        <!--begin:::Tab item-->
                        <li class="nav-item ms-auto">
                            <!--begin::Action menu-->
                            <a href="#" class="btn btn-primary ps-7 text-black" data-kt-menu-trigger="click" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">Actions
                            <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                            <span class="svg-icon svg-icon-2 text-black me-0">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none">
                                    <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                                </svg>
                            </span>
                            <!--end::Svg Icon--></a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-bold py-4 w-250px fs-6" data-kt-menu="true">
                                
                                <!--begin::Menu item-->
                                <div class="menu-item px-5">
                                    <div class="menu-content text-muted pb-2 px-5 fs-7 text-uppercase">Account</div>
                                </div>
                                <!--end::Menu item-->
                            
                                <!--begin::Menu item-->
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
                                <!--end::Menu item-->
                              
                            </div>
                            <!--end::Menu-->
                            <!--end::Menu-->
                        </li>
                        <!--end:::Tab item-->
                    </ul>
                    <!--end:::Tabs-->
                    <!--begin:::Tab content-->
                    <div class="tab-content" id="myTabContent">
                        <!--begin:::Tab pane-->
                        <div class="tab-pane fade active show" id="kt_employee_view_overview_tab" role="tabpanel">
                            
                            <!--begin::Card-->
                            <div class="card pt-4 mb-6 mb-xl-9">
                                <!--begin::Card header-->
                                <div class="card-header border-0">
                                    <!--begin::Card title-->
                                    <div class="card-title">
                                        <h2>History</h2>
                                    </div>
                                    <!--end::Card title-->
                                    
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0 pb-5">
                                    <!--begin::Table-->
                                    <div id="kt_table_employees_payment_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                                        <div class="table-responsive">
                                            <table class="table align-middle table-row-dashed gy-5 dataTable no-footer" id="kt_table_employees_payment">
                                                <!--begin::Table head-->
                                                <thead class="border-bottom border-gray-200 fs-7 fw-bolder">
                                                    <!--begin::Table row-->
                                                    <tr class="text-start text-muted text-uppercase gs-0">
                                                        <th>Date</th>
                                                        <th>Time</th>
                                                        <th>Out Time</th>
                                                        <th>In Time</th>
                                                        <th >Remarks</th>
                                                        <th></th></tr>
                                                    <!--end::Table row-->
                                                </thead>
                                                <!--end::Table head-->
                                                <!--begin::Table body-->
                                                <tbody class="fs-6 fw-bold text-gray-600">
                                                   
                                                </tbody>
                                                <!--end::Table body-->
                                            </table>
                                        </div>
                                        <!--end::Table-->
                                    </div>
                                    <!--end::Card body-->
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
            <!--begin::Modals-->
            <!-- Update Customer Modal-->
            <div class="modal fade" id="modal_edit_employee" tabindex="-1" style="display: none;" aria-hidden="true">
                <!--begin::Modal dialog-->
                <div class="modal-dialog modal-dialog-centered mw-850px">
                    <!--begin::Modal content-->
                    <div class="modal-content">
                        <!--begin::Modal header-->
                        <div class="modal-header">
                            <!--begin::Modal title-->
                            <h2 id="modal_title">Add Customer</h2>
                            <!--end::Modal title-->
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
                        <!--end::Modal header-->
                        <!--begin::Modal body-->
                        <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                            <!--begin::Form-->
                            <form id="update_employee_form" class="form fv-plugins-bootstrap5 fv-plugins-framework">
                                <!--begin::Input group-->
                                @csrf
                                <div class="row mb-10">
                                <div id="errors" hidden></div>
                                    <!--begin::Row-->
                                    <div class="row fv-row fv-plugins-icon-container">
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">First Name</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="First name is required" ></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" id="edit_first_name" class="form-control form-control-solid" placeholder="First Name of Customer" name="edit_first_name">
                                        </div>
                                        <!--end::Col-->
                                        <!--begin::Col-->
                                        <div class="col-6">
                                            <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                <span class="required">Last Name</span>
                                                <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Last name is required"></i>
                                            </label>
                                            <!--end::Label-->
                                            <input type="text" id="edit_last_name" class="form-control form-control-solid" placeholder="Last Name of Customer" name="edit_last_name">
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Row-->
                                    <!--begin::Row-->
                                    <div class="row mt-3">
                                        
                                        <div class="col-xl-12">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">Address</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Customer's address is required" ></i>
                                                </label>
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="edit_address" id="edit_address" placeholder="Lot #/ Block #, Etc" required>
                                                <span class="form-text text-muted">Please enter your address.</span>
                                            <div class="fv-plugins-message-container"></div></div>
                                        </div>
                                    </div>
                                    <!--end::Row-->
                                   
                                    <div class="row">
                                        <div class="col-xl-4">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label class="d-flex align-items-center fs-6 fw-bold form-label mb-2">
                                                    <span class="required">Contact Number</span>
                                                    <i class="fas fa-exclamation-circle ms-2 fs-7" data-bs-toggle="tooltip" title="" data-bs-original-title="Customer's contact number is required" ></i>
                                                </label>
                                                <input type="text" class="form-control form-control-lg form-control-solid" name="edit_mobile_num" placeholder="0999-999-9999" id="edit_mobile_num" required>
                                                <span class="form-text text-muted">Please enter contact number.</span>
                                            <div class="fv-plugins-message-container"></div></div>
                                        </div>
                                        <div class="col-xl-4">
                                            <div class="form-group fv-plugins-icon-container">
                                                <label>Facebook</label>
                                                <input type="text" class="form-control form-control-lg form-control-solid" id="edit_facebook" name="edit_facebook" placeholder="http://facebook.com/skinaura" required>
                                                <span class="form-text text-muted">Please enter facebook link</span>
                                            <div class="fv-plugins-message-container"></div></div>
                                        </div>
                                    </div>
                                </div>
                                <!--end::Input group-->
                                <!--begin::Actions-->
                                <div class="text-center pt-15">
                                    <input type="hidden" id="edit_employee_id" name="edit_employee_id"required>
                                    <button type="reset" id="kt_modal_new_card_cancel" class="btn btn-light me-3" data-bs-dismiss="modal">Discard</button>
                                    <button type="submit" id="updateemployee" class="btn btn-primary">
                                        <span class="indicator-label">Update</span>
                                        <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    </button>
                                </div>
                                <!--end::Actions-->
                            
                            </form>
                            <!--end::Form-->
                        </div>
                        <!--end::Modal body-->
                    </div>
                    <!--end::Modal content-->
                </div>
                <!--end::Modal dialog-->
            </div>
            <!-- End Update Customer Modal -->
            <div class="modal fade" id="employeeUpdateModalSuccess" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdrop" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="titleSuccess">Update employee</h5>
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
                            <div class="alert alert-success alert-message" role="alert"> Customer successfully updated...</div>
                        </div>
                        <div class="modal-footer">
                    
                            <button type="button" class="btn btn-light-success btn-sm font-weight-bold closeblock" data-dismiss="modal"> <i class=" fas fa-check"></i> Close</button>
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Modals-->
            
        </div>
        <!--end::Container-->
    </div>
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
