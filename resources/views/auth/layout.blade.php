<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../../">
		<title>{{config('app.name')}}</title>
		<meta charset="utf-8" />
		<meta name="description" content="A base project to use for web application" />
		<meta name="keywords" content="base project, laravel, panel, dashboard" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="article" />
		<meta property="og:title" content="{{config('app.name')}}" />
		<meta property="og:url" content="https://azway.ph.com/base" />
		<meta property="og:site_name" content="{{config('app.name')}}" />
		<link rel="canonical" href="https://azway.ph.com/base" />
		<link rel="shortcut icon" href="{{asset('assets/media/logos/favicon.ico')}}" />
		<!--begin::Fonts-->
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
		<!--end::Fonts-->
		<!--begin::Global Stylesheets Bundle(used by all pages)-->
		<link href="{{asset('assets/plugins/global/plugins.bundle.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('assets/css/style.bundle.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Stylesheets Bundle-->
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="bg-body">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - Sign-in -->
			<div class="d-flex flex-column flex-lg-row flex-column-fluid">
				<!--begin::Aside-->
				<div class="d-flex flex-column flex-lg-row-auto w-xl-600px positon-xl-relative" style="background-color: #009EF6">
					<!--begin::Wrapper-->
					<div class="d-flex flex-column position-xl-fixed top-0 bottom-0 w-xl-600px scroll-y">
						<!--begin::Content-->
						<div class="d-flex flex-row-fluid flex-column text-center p-10 pt-lg-20">
							<!--begin::Logo-->
							<a href="../../demo1/dist/index.html" class="py-9 mb-5">
								<img alt="Logo" src="{{asset('assets/media/logos/logo-2.svg')}}" class="h-60px" />
							</a>
							<!--end::Logo-->
							<!--begin::Title-->
							<h1 class="fw-bolder fs-2qx pb-5 pb-md-10" style="color: #fff;">Welcome to {{config('app.name')}}</h1>
							<!--end::Title-->
							<!--begin::Description-->
							<p class="fw-bold fs-2" style="color: #fff;">Base Project build.</p>
							<!--end::Description-->
						</div>
						<!--end::Content-->
						<!--begin::Illustration-->
						<div class="d-flex flex-row-auto bgi-no-repeat bgi-position-x-center bgi-size-contain bgi-position-y-bottom min-h-100px min-h-lg-350px" style="background-image: url(assets/media/illustrations/sketchy-1/13.png"></div>
						<!--end::Illustration-->
					</div>
					<!--end::Wrapper-->
				</div>
				<!--end::Aside-->
				<!--begin::Body-->
				
                @yield('auth-content')
				<!--end::Body-->
			</div>
			<!--end::Authentication - Sign-in-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--begin::Page Custom Javascript(used by this page)-->
		<!-- <script src="{{asset('assets/js/custom/authentication/sign-in/general.js')}}"></script> -->
		<!--end::Page Custom Javascript-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>