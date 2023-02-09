<!DOCTYPE html>
<html lang="en">
	<!--begin::Head-->
	<head><base href="../../">
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
	<body id="kt_body" class="auth-bg">
		<!--begin::Main-->
		<!--begin::Root-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Authentication - 404 Page-->
			<div class="d-flex flex-column flex-center flex-column-fluid p-10">
				<!--begin::Illustration-->
				
				<!--end::Illustration-->
				<!--begin::Message-->
				@yield('content');
				<!--end::Message-->
				<!--begin::Link-->
				<a href="/" class="btn btn-primary">Return Home</a>
				<!--end::Link-->
			</div>
			<!--end::Authentication - 404 Page-->
		</div>
		<!--end::Root-->
		<!--end::Main-->
		<!--begin::Javascript-->
		<script>var hostUrl = "assets/";</script>
		<!--begin::Global Javascript Bundle(used by all pages)-->
		<script src="{{asset('assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('assets/js/scripts.bundle.js')}}"></script>
		<!--end::Global Javascript Bundle-->
		<!--end::Javascript-->
	</body>
	<!--end::Body-->
</html>