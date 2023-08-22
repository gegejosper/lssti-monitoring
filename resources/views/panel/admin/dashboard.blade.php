@extends('layouts.panel')
@section('content')
<!--begin::Post-->
<div class="content flex-row-fluid" id="kt_content">
						
	<!--begin::Row-->
	<div class="row g-5 g-lg-10">
		<!--begin::Col-->
		<div class="col-xl-4 mb-xl-10">
			<!--begin::Mixed Widget 2-->
			<div class="card h-xl-100">
				<!--begin::Header-->
				<div class="card-header border-0 bg-primary py-5">
					<h3 class="card-title fw-bold text-white">Sales Statistics</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-white btn-active-white btn-active-color- border-0 me-n3" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<i class="ki-duotone ki-category fs-6">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
							</i>
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
									<i class="ki-duotone ki-information fs-6">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</span></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body p-0">
					<!--begin::Chart-->
					<div class="mixed-widget-2-chart card-rounded-bottom bg-primary" data-kt-color="primary" style="height: 200px"></div>
					<!--end::Chart-->
					<!--begin::Stats-->
					<div class="card-p mt-n20 position-relative">
						<!--begin::Row-->
						<div class="row g-0">
							<!--begin::Col-->
							<div class="col d-flex flex-column bg-light-warning px-6 py-8 rounded-2 me-7 mb-7">
								<i class="ki-duotone ki-chart-simple fs-2x text-warning my-2">
									<span class="path1"></span>
									<span class="path2"></span>
									<span class="path3"></span>
									<span class="path4"></span>
								</i>
								<a href="#" class="text-warning fw-semibold fs-6">Weekly Sales</a>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col d-flex flex-column bg-light-primary px-6 py-8 rounded-2 mb-7">
								<i class="ki-duotone ki-briefcase fs-2x text-primary my-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<a href="#" class="text-primary fw-semibold fs-6">New Projects</a>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row g-0">
							<!--begin::Col-->
							<div class="col d-flex flex-column bg-light-danger px-6 py-8 rounded-2 me-7">
								<i class="ki-duotone ki-abstract-26 fs-2x text-danger my-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<a href="#" class="text-danger fw-semibold fs-6 mt-2">Item Orders</a>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col d-flex flex-column bg-light-success px-6 py-8 rounded-2">
								<i class="ki-duotone ki-sms fs-2x text-success my-2">
									<span class="path1"></span>
									<span class="path2"></span>
								</i>
								<a href="#" class="text-success fw-semibold fs-6 mt-2">Bug Reports</a>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Stats-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 2-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4 mb-xl-10">
			<!--begin::Mixed Widget 6-->
			<div class="card h-xl-100">
				<!--begin::Beader-->
				<div class="card-header border-0 py-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold fs-3 mb-1">Sales Statistics</span>
						<span class="text-muted fw-semibold fs-7">Recent sales statistics</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<i class="ki-duotone ki-category fs-6">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
							</i>
						</button>
						<!--begin::Menu 1-->
						<div class="menu menu-sub menu-sub-dropdown w-250px w-md-300px" data-kt-menu="true" id="kt_menu_64b0c78ab24e3">
							<!--begin::Header-->
							<div class="px-7 py-5">
								<div class="fs-5 text-dark fw-bold">Filter Options</div>
							</div>
							<!--end::Header-->
							<!--begin::Menu separator-->
							<div class="separator border-gray-200"></div>
							<!--end::Menu separator-->
							<!--begin::Form-->
							<div class="px-7 py-5">
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Status:</label>
									<!--end::Label-->
									<!--begin::Input-->
									<div>
										<select class="form-select form-select-solid" multiple="multiple" data-kt-select2="true" data-close-on-select="false" data-placeholder="Select option" data-dropdown-parent="#kt_menu_64b0c78ab24e3" data-allow-clear="true">
											<option></option>
											<option value="1">Approved</option>
											<option value="2">Pending</option>
											<option value="2">In Process</option>
											<option value="2">Rejected</option>
										</select>
									</div>
									<!--end::Input-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Member Type:</label>
									<!--end::Label-->
									<!--begin::Options-->
									<div class="d-flex">
										<!--begin::Options-->
										<label class="form-check form-check-sm form-check-custom form-check-solid me-5">
											<input class="form-check-input" type="checkbox" value="1" />
											<span class="form-check-label">Author</span>
										</label>
										<!--end::Options-->
										<!--begin::Options-->
										<label class="form-check form-check-sm form-check-custom form-check-solid">
											<input class="form-check-input" type="checkbox" value="2" checked="checked" />
											<span class="form-check-label">Customer</span>
										</label>
										<!--end::Options-->
									</div>
									<!--end::Options-->
								</div>
								<!--end::Input group-->
								<!--begin::Input group-->
								<div class="mb-10">
									<!--begin::Label-->
									<label class="form-label fw-semibold">Notifications:</label>
									<!--end::Label-->
									<!--begin::Switch-->
									<div class="form-check form-switch form-switch-sm form-check-custom form-check-solid">
										<input class="form-check-input" type="checkbox" value="" name="notifications" checked="checked" />
										<label class="form-check-label">Enabled</label>
									</div>
									<!--end::Switch-->
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
						</div>
						<!--end::Menu 1-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body p-0 d-flex flex-column">
					<!--begin::Stats-->
					<div class="card-px pt-5 pb-10 flex-grow-1">
						<!--begin::Row-->
						<div class="row g-0 mt-5 mb-10">
							<!--begin::Col-->
							<div class="col">
								<div class="d-flex align-items-center me-2">
									<!--begin::Symbol-->
									<div class="symbol symbol-50px me-3">
										<div class="symbol-label bg-light-info">
											<i class="ki-duotone ki-bucket fs-1 text-info">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
											</i>
										</div>
									</div>
									<!--end::Symbol-->
									<!--begin::Title-->
									<div>
										<div class="fs-4 text-dark fw-bold">$2,034</div>
										<div class="fs-7 text-muted fw-bold">Author Sales</div>
									</div>
									<!--end::Title-->
								</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col">
								<div class="d-flex align-items-center me-2">
									<!--begin::Symbol-->
									<div class="symbol symbol-50px me-3">
										<div class="symbol-label bg-light-danger">
											<i class="ki-duotone ki-abstract-26 fs-1 text-danger">
												<span class="path1"></span>
												<span class="path2"></span>
											</i>
										</div>
									</div>
									<!--end::Symbol-->
									<!--begin::Title-->
									<div>
										<div class="fs-4 text-dark fw-bold">$706</div>
										<div class="fs-7 text-muted fw-bold">Commision</div>
									</div>
									<!--end::Title-->
								</div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
						<!--begin::Row-->
						<div class="row g-0">
							<!--begin::Col-->
							<div class="col">
								<div class="d-flex align-items-center me-2">
									<!--begin::Symbol-->
									<div class="symbol symbol-50px me-3">
										<div class="symbol-label bg-light-success">
											<i class="ki-duotone ki-basket fs-1 text-success">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
											</i>
										</div>
									</div>
									<!--end::Symbol-->
									<!--begin::Title-->
									<div>
										<div class="fs-4 text-dark fw-bold">$49</div>
										<div class="fs-7 text-muted fw-bold">Average Bid</div>
									</div>
									<!--end::Title-->
								</div>
							</div>
							<!--end::Col-->
							<!--begin::Col-->
							<div class="col">
								<div class="d-flex align-items-center me-2">
									<!--begin::Symbol-->
									<div class="symbol symbol-50px me-3">
										<div class="symbol-label bg-light-primary">
											<i class="ki-duotone ki-barcode fs-1 text-primary">
												<span class="path1"></span>
												<span class="path2"></span>
												<span class="path3"></span>
												<span class="path4"></span>
												<span class="path5"></span>
												<span class="path6"></span>
												<span class="path7"></span>
												<span class="path8"></span>
											</i>
										</div>
									</div>
									<!--end::Symbol-->
									<!--begin::Title-->
									<div>
										<div class="fs-4 text-dark fw-bold">$5.8M</div>
										<div class="fs-7 text-muted fw-bold">All Time Sales</div>
									</div>
									<!--end::Title-->
								</div>
							</div>
							<!--end::Col-->
						</div>
						<!--end::Row-->
					</div>
					<!--end::Stats-->
					<!--begin::Chart-->
					<div class="mixed-widget-6-chart card-rounded-bottom" data-kt-chart-color="success" style="height: 200px"></div>
					<!--end::Chart-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::Mixed Widget 6-->
		</div>
		<!--end::Col-->
		<!--begin::Col-->
		<div class="col-xl-4 mb-5 mb-lg-10">
			<!--begin::List Widget 4-->
			<div class="card h-xl-100">
				<!--begin::Header-->
				<div class="card-header border-0 pt-5">
					<h3 class="card-title align-items-start flex-column">
						<span class="card-label fw-bold text-dark">Trends</span>
						<span class="text-muted mt-1 fw-semibold fs-7">Latest tech trends</span>
					</h3>
					<div class="card-toolbar">
						<!--begin::Menu-->
						<button type="button" class="btn btn-sm btn-icon btn-color-primary btn-active-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
							<i class="ki-duotone ki-category fs-6">
								<span class="path1"></span>
								<span class="path2"></span>
								<span class="path3"></span>
								<span class="path4"></span>
							</i>
						</button>
						<!--begin::Menu 3-->
						<div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg-light-primary fw-semibold w-200px py-3" data-kt-menu="true">
							<!--begin::Heading-->
							<div class="menu-item px-3">
								<div class="menu-content text-muted pb-2 px-3 fs-7 text-uppercase">Payments</div>
							</div>
							<!--end::Heading-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Create Invoice</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link flex-stack px-3">Create Payment
								<span class="ms-2" data-bs-toggle="tooltip" title="Specify a target name for future usage and reference">
									<i class="ki-duotone ki-information fs-6">
										<span class="path1"></span>
										<span class="path2"></span>
										<span class="path3"></span>
									</i>
								</span></a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3">
								<a href="#" class="menu-link px-3">Generate Bill</a>
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3" data-kt-menu-trigger="hover" data-kt-menu-placement="right-end">
								<a href="#" class="menu-link px-3">
									<span class="menu-title">Subscription</span>
									<span class="menu-arrow"></span>
								</a>
								<!--begin::Menu sub-->
								<div class="menu-sub menu-sub-dropdown w-175px py-4">
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Plans</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Billing</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<a href="#" class="menu-link px-3">Statements</a>
									</div>
									<!--end::Menu item-->
									<!--begin::Menu separator-->
									<div class="separator my-2"></div>
									<!--end::Menu separator-->
									<!--begin::Menu item-->
									<div class="menu-item px-3">
										<div class="menu-content px-3">
											<!--begin::Switch-->
											<label class="form-check form-switch form-check-custom form-check-solid">
												<!--begin::Input-->
												<input class="form-check-input w-30px h-20px" type="checkbox" value="1" checked="checked" name="notifications" />
												<!--end::Input-->
												<!--end::Label-->
												<span class="form-check-label text-muted fs-6">Recuring</span>
												<!--end::Label-->
											</label>
											<!--end::Switch-->
										</div>
									</div>
									<!--end::Menu item-->
								</div>
								<!--end::Menu sub-->
							</div>
							<!--end::Menu item-->
							<!--begin::Menu item-->
							<div class="menu-item px-3 my-1">
								<a href="#" class="menu-link px-3">Settings</a>
							</div>
							<!--end::Menu item-->
						</div>
						<!--end::Menu 3-->
						<!--end::Menu-->
					</div>
				</div>
				<!--end::Header-->
				<!--begin::Body-->
				<div class="card-body pt-5">
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/plurk.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Top Authors</a>
								<span class="text-muted fw-semibold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+82$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/telegram.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Popular Authors</a>
								<span class="text-muted fw-semibold d-block fs-7">Randy, Steve, Mike</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+280$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/vimeo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">New Users</a>
								<span class="text-muted fw-semibold d-block fs-7">John, Pat, Jimmy</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+4500$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/bebo.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Active Customers</a>
								<span class="text-muted fw-semibold d-block fs-7">Mark, Rowling, Esther</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+686$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center mb-7">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/kickstarter.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Bestseller Theme</a>
								<span class="text-muted fw-semibold d-block fs-7">Disco, Retro, Sports</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+726$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
					<!--begin::Item-->
					<div class="d-flex align-items-sm-center">
						<!--begin::Symbol-->
						<div class="symbol symbol-50px me-5">
							<span class="symbol-label">
								<img src="{{asset('assets/media/svg/brand-logos/fox-hub.svg')}}" class="h-50 align-self-center" alt="" />
							</span>
						</div>
						<!--end::Symbol-->
						<!--begin::Section-->
						<div class="d-flex align-items-center flex-row-fluid flex-wrap">
							<div class="flex-grow-1 me-2">
								<a href="#" class="text-gray-800 text-hover-primary fs-6 fw-bold">Fox Broker App</a>
								<span class="text-muted fw-semibold d-block fs-7">Finance, Corporate, Apps</span>
							</div>
							<span class="badge badge-light fw-bold my-2">+145$</span>
						</div>
						<!--end::Section-->
					</div>
					<!--end::Item-->
				</div>
				<!--end::Body-->
			</div>
			<!--end::List Widget 4-->
		</div>
		<!--end::Col-->
	</div>
	<!--end::Row-->
</div>
<!--end::Post-->
@endsection