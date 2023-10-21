<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Zanex – Bootstrap  Admin & Dashboard Template">
		<meta name="author" content="Spruko Technologies Private Limited">
		<meta name="keywords" content="admin, dashboard, dashboard ui, admin dashboard template, admin panel dashboard, admin panel html, admin panel html template, admin panel template, admin ui templates, administrative templates, best admin dashboard, best admin templates, bootstrap 4 admin template, bootstrap admin dashboard, bootstrap admin panel, html css admin templates, html5 admin template, premium bootstrap templates, responsive admin template, template admin bootstrap 4, themeforest html">

		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.ico')}}" />

		<!-- TITLE -->
		<title>TrX.Game</title>

		<!-- BOOTSTRAP CSS -->
		<link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

		<!-- STYLE CSS -->
		<link href="{{asset('assets/css/style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/dark-style.css')}}" rel="stylesheet"/>
		<link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

		<!-- SIDE-MENU CSS -->
		<link href="{{asset('assets/css/sidemenu.css')}}" rel="stylesheet" id="sidemenu-theme">

		<!--C3 CHARTS CSS -->
		<link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet"/>

		<!-- P-scroll bar css-->
		<link href="{{asset('assets/plugins/p-scroll/perfect-scrollbar.css')}}" rel="stylesheet" />

		<!--- FONT-ICONS CSS -->
		<link href="{{asset('assets/css/icons.css')}}" rel="stylesheet"/>

		<!-- SIDEBAR CSS -->
		<link href="{{asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

		<!-- SELECT2 CSS -->
		<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet"/>

		<!-- INTERNAL ion.rangeSlider css -->
		<link href="{{asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.css')}}" rel="stylesheet">
		<link href="{{asset('assets/plugins/ion-rangeslider/css/ion.rangeSlider.skinFlat.css')}}" rel="stylesheet">

		<!-- INTERNAL Data table css -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet" />

		<!-- COLOR SKIN CSS -->
		<link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />

		<!--SWEET ALERT CSS-->
		<link href="{{asset('assets/plugins/sweet-alert/sweetalert2.min.css')}}" rel="stylesheet" />

		<!-- DATA TABLE CSS -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
		<link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet" />

		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

	</head>

	<body class="app sidebar-mini dark-mode">

		<!-- GLOBAL-LOADER -->
		<div id="global-loader">
			<img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
		</div>
		<!-- /GLOBAL-LOADER -->

		<!-- PAGE -->
		<div class="page">
			<div class="page-main">
				@include('layouts.nav')
				@include('layouts.header')
				
				@yield('content')

                
            </div>

			@include('layouts.sidebar-right')

			@include('layouts.footer')
		</div>

		<!-- BACK-TO-TOP -->
		<a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

		<!-- JQUERY JS -->
		<script src="{{asset('assets/js/jquery.min.js')}}"></script>

		<!-- BOOTSTRAP JS -->
		<script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>
		<script src="{{asset('assets/plugins/bootstrap/js/bootstrap.min.js')}}"></script>

		<!-- SPARKLINE JS-->
		<script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

		<!-- CHART-CIRCLE JS-->
		<script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

		<!-- CHARTJS CHART JS-->
		<script src="{{asset('assets/plugins/chart/Chart.bundle.js')}}"></script>
		<script src="{{asset('assets/plugins/chart/utils.js')}}"></script>

		<!-- PIETY CHART JS-->
		<script src="{{asset('assets/plugins/peitychart/jquery.peity.min.js')}}"></script>
		<script src="{{asset('assets/plugins/peitychart/peitychart.init.js')}}"></script>

		<!-- INTERNAL SELECT2 JS -->
		<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>

		<!-- INTERNAL Data tables js-->
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/dataTables.responsive.min.js')}}"></script>

		<!-- ECHART JS-->
		<script src="{{asset('assets/plugins/echarts/echarts.js')}}"></script>


		<!-- SIDE-MENU JS-->
		<script src="{{asset('assets/plugins/sidemenu/sidemenu.js')}}"></script>

		<!-- SIDEBAR JS -->
		<script src="{{asset('assets/plugins/sidebar/sidebar.js')}}"></script>

		<!-- Perfect SCROLLBAR JS-->
		<script src="{{asset('assets/plugins/p-scroll/perfect-scrollbar.js')}}"></script>
		<script src="{{asset('assets/plugins/p-scroll/pscroll.js')}}"></script>
		<script src="{{asset('assets/plugins/p-scroll/pscroll-1.js')}}"></script>

		<!-- APEXCHART JS -->
		<script src="{{asset('assets/js/apexcharts.js')}}"></script>

		<!-- INDEX JS -->
		<script src="{{asset('assets/js/index1.js')}}"></script>

		<!-- CUSTOM JS -->
		<script src="{{asset('assets/js/custom.js')}}"></script>

		<!-- INTERNAL ion.rangeSlider.min js -->
		<script src="{{asset('assets/plugins/ion-rangeslider/js/ion.rangeSlider.min.js')}}"></script>
		<script src="{{asset('assets/js/rangeslider.js')}}"></script>

		<!-- SWEET-ALERT JS -->
		<script src="{{asset('assets/plugins/sweet-alert/sweetalert2.all.min.js')}}"></script>

		<!-- COUNTERS JS-->
		<script src="{{asset('assets/plugins/counters/counterup.min.js')}}"></script>
		<script src="{{asset('assets/plugins/counters/waypoints.min.js')}}"></script>
		{{-- <script src="{{asset('assets/plugins/counters/counters-1.js')}}"></script> --}}
		
		<!-- DATA TABLE JS-->
		<script src="{{asset('assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.bootstrap5.js')}}"></script>
		<script src="{{asset('assets/plugins/datatable/js/dataTables.buttons.min.js')}}"></script>

		{{-- money --}}
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.13.4/jquery.mask.min.js"></script>

		<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>

		<script src= "https://code.jquery.com/ui/1.10.4/jquery-ui.js"> </script> 

		@yield('js')

		<script>
			$(document).ready(function () {
				$('.money').mask("#,##0", {reverse: true});

				$(".form_decimal").on("input", function(evt) {
					var self = $(this);
					self.val(self.val().replace(/[^0-9\.]/g, ''));
					if ((evt.which != 46 || self.val().indexOf('.') != -1) && (evt.which < 48 || evt.which > 57)) 
					{
						evt.preventDefault();
					}
				});
			});
		</script>
	</body>
</html>