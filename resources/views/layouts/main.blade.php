<!doctype html>
<html lang="en" dir="ltr">
	<head>

		<!-- META DATA -->
		<meta charset="UTF-8">
		<meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
		
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Play online games and win bonuses. We have the best collection of games availalbe for YOU! Sign Up Sign In. Our Awesome Games">
		<meta name="author" content="TrxGames.online">
		<meta name="keywords" content="Tron Games, TronGames.online, Tron Online, Trx Games, Trx.games, TrxGames.online">

		<meta name="csrf-token" content="{{ csrf_token() }}" />

		<!-- FAVICON -->
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/logo/favicon.ico')}}" />

		<!-- TITLE -->
		<title>Tron-X.Game</title>

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
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.5.5/css/simple-line-icons.min.css">

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

		<!-- TABS STYLES -->
		<link href="{{asset('assets/plugins/tabs/tabs.css')}}" rel="stylesheet" />

		<!-- DATA TABLE CSS -->
		<link href="{{asset('assets/plugins/datatable/css/dataTables.bootstrap5.css')}}" rel="stylesheet" />
		<link href="{{asset('assets/plugins/datatable/css/buttons.bootstrap5.min.css')}}"  rel="stylesheet">
		<link href="{{asset('assets/plugins/datatable/responsive.bootstrap5.css')}}" rel="stylesheet" />

		<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

		<style>
			.otp-field {
			flex-direction: row;
			column-gap: 10px;
			display: flex;
			align-items: center;
			justify-content: center;
			}

			.otp-field input {
			height: 45px;
			width: 42px;
			border-radius: 6px;
			outline: none;
			font-size: 1.125rem;
			text-align: center;
			border: 1px solid #ddd;
			}
			.otp-field input:focus {
			box-shadow: 0 1px 0 rgba(0, 0, 0, 0.1);
			}
			.otp-field input::-webkit-inner-spin-button,
			.otp-field input::-webkit-outer-spin-button {
			display: none;
			}

			.resend {
			font-size: 12px;
			}

			.footer {
			position: absolute;
			bottom: 10px;
			right: 10px;
			color: black;
			font-size: 12px;
			text-align: right;
			font-family: monospace;
			}

			.footer a {
			color: black;
			text-decoration: none;
			}
		</style>
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
				@include('layouts.topup.topup')
				
				@yield('content')

                
            </div>

			@include('layouts.sidebar-right')

			@include('layouts.footer')
		</div>

		<div class="modal fade" id="modalotp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
			<div class="modal-dialog modal-dialog-centered modal-lg text-center" role="document">
				<div class="modal-content modal-content-demo">
					<div class="modal-header">
						<h6 class="modal-title">Verify Account</h6>
					</div>
					<div class="modal-body">
						<div class="card-body p-5 text-center">
							{{-- <h4>Verify</h4> --}}
							<p>Please verify your account!</p>
				
							<div class="otp-field mb-4">
							  <input type="text" maxlength="1" id="otp1"/>
							  <input type="text" maxlength="1" id="otp2"/>
							  <input type="text" maxlength="1" id="otp3"/>
							  <input type="text" maxlength="1" id="otp4"/>
							  <input type="text" maxlength="1" id="otp5"/>
							  <input type="text" maxlength="1" id="otp6"/>
							</div>
							<p><a href="javascript:void(0)" onclick="sendVerivyCode()">Send Verify Code</a></p>
							<span id="text-otp" style="color: green"></span>
							<hr>
							<button class="btn btn-primary mb-3" onclick="verify()">Verify</button>
				
							<p class="resend text-muted mb-0">
							  Didn't receive code? <a href="javascript:void(0)" onclick="sendVerivyCode()">Request again</a>
							</p>
						  </div>
					</div>
					<div class="modal-footer">
						{{-- <button class="btn btn-light" data-bs-dismiss="modal" >Close</button> --}}
					</div>
				</div>
			</div>
		</div>
		<input type="hidden" id="email" value="{{isset(Auth::user()->email) ? Auth::user()->email : ""}}">

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
		<script src="{{asset('assets/plugins/sidemenu/sidemenu1.js')}}"></script>

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

		<!--- TABS JS -->
		<script src="{{asset('assets/plugins/tabs/jquery.multipurpose_tabcontent.js')}}"></script>
		<script src="{{asset('assets/plugins/tabs/tab-content.js')}}"></script>

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

		@include('layouts.topup.js-topup')
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

				$('#modaldemo8').on('hidden.bs.modal', function () {
					$('#address_topup').hide();
				})

				$("#tab-content-first").removeAttr('class');
				$('#tab-content-first').addClass('tab_content active');

				if ('{{Auth::user()}}') {
					let is_verify = '{{isset(Auth::user()->is_verify) ? Auth::user()->is_verify : 0}}'
					if (is_verify != 1) {
						$('#modalotp').modal({
							backdrop: 'static',
							keyboard: false
						});
						$('#modalotp').modal('show');    	
					}
				}
			});

		function sendVerivyCode() {
			// console.log('masuk');
			let email = $('#email').val();
            

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "/send-otp",
                method: 'POST',
                dataType: 'json',
                data: {
                    email: email
                },
                success: function (response) {
                    // console.log(response.message);
                    if (response.status) {
                        // $('#text-otp').show();
                        $('#text-otp').html(response.message);
                    }else{
                        // $('#text-otp').hide();
                        $('#text-otp').html(response.message);
                    }
                }
            });
		}

        function verify() {
            let otp1 = $('#otp1').val();
            let otp2 = $('#otp2').val();
            let otp3 = $('#otp3').val();
            let otp4 = $('#otp4').val();
            let otp5 = $('#otp5').val();
            let otp6 = $('#otp6').val();

            let verify_code = otp1+otp2+otp3+otp4+otp5+otp6;

            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: "{{route('verify-acc')}}",
                method: 'POST',
                dataType: 'json',
                data: {
                    verify_code: verify_code
                },
                success: function (response) {
                    // console.log(response.message);
                    if (response.status) {
                        Swal.fire({
                            title: "Success",
                            text: "Your account has been verified.",
                            icon: "success"
                        }).then(function() {
                            location.reload();
                        });
                    }else{

                    }
                }
            });
        }
		</script>
	</body>
</html>