<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Change to public so that JS and CSS do not get broken by url parameters-->
	<base href="/public">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>meetGeek.ai</title>
	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">

	<link rel="stylesheet" href="plugins/jquery-ui/jquery-ui.css">

	<link rel="stylesheet" href="dist/css/custom/bootstrap3-wysihtml5.min.css">
	<link rel="stylesheet" href="dist/css/custom/toastr.min.css">
	<link rel="stylesheet" href="dist/css/custom/easy-autocomplete.min.css">
	<link rel="stylesheet" href="dist/css/custom/easy-autocomplete.themes.min.css">

	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

	<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/animations/scale.css" />

	<link rel="stylesheet" href="https://unpkg.com/tippy.js@6/themes/light.css" />

	<!-- Google Font: Source Sans Pro -->
	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
	<!-- Custom CSS style -->
	<link rel="stylesheet" href="dist/css/custom/toggleswitch.css">

	<!-- jQuery -->
	<script src="plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="plugins/jquery-ui/jquery-ui.min.js"></script>

	<!-- Stripe -->
	<script src="https://js.stripe.com/v3/"></script>

	<!-- Tippy Production -->
	<script src="https://unpkg.com/@popperjs/core@2"></script>
	<script src="https://unpkg.com/tippy.js@6"></script>

	<!-- Hotjar Tracking Code for https://app.meetgeek.ai -->
	<script>
		(function(h, o, t, j, a, r) {
			h.hj = h.hj || function() {
				(h.hj.q = h.hj.q || []).push(arguments)
			};
			h._hjSettings = {
				hjid: 1938542,
				hjsv: 6
			};
			a = o.getElementsByTagName('head')[0];
			r = o.createElement('script');
			r.async = 1;
			r.src = t + h._hjSettings.hjid + j + h._hjSettings.hjsv;
			a.appendChild(r);
		})(window, document, 'https://static.hotjar.com/c/hotjar-', '.js?sv=');
	</script>

	<!-- GetButton.io widget -->
	<script type="text/javascript">
		(function() {
			var options = {
				facebook: "102158254787146", // Facebook page ID
				email: "support@meetgeek.ai", // Email
				call_to_action: "Message us", // Call to action
				button_color: "#129BF4", // Color of button
				position: "right", // Position may be 'right' or 'left'
				order: "email,facebook", // Order of buttons
			};
			var proto = document.location.protocol,
				host = "getbutton.io",
				url = proto + "//static." + host;
			var s = document.createElement('script');
			s.type = 'text/javascript';
			s.async = true;
			s.src = url + '/widget-send-button/js/init.js';
			s.onload = function() {
				WhWidgetSendButton.init(host, proto, options);
			};
			var x = document.getElementsByTagName('script')[0];
			x.parentNode.insertBefore(s, x);
		})();
	</script>
	<!-- /GetButton.io widget -->

	<script>
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});
	</script>

</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse text-sm">
	<div class="wrapper">


		<!-- Calendly badge widget begin -->
		<!-- <link href="https://assets.calendly.com/assets/external/widget.css"
			rel="stylesheet">
		<script src="https://assets.calendly.com/assets/external/widget.js"
			type="text/javascript"></script>
		<script type="text/javascript">Calendly.initBadgeWidget({ url: 'https://calendly.com/dan-huru/30min', text: 'Request a demo', color: '#00a2ff', textColor: '#ffffff', branding: true });</script> -->
		<!-- Calendly badge widget end -->

		<!-- Navbar -->
		@include('layouts.navbar')
		<!-- /.navbar -->

		<!-- Main Sidebar Container -->
		<aside class="main-sidebar sidebar-dark-primary elevation-4">
			<!-- Brand Logo -->
			<a href="/" class="brand-link"> <img src="dist/img/logo_small.png" alt="MeetGeek AI" class="brand-image img-circle elevation-3" style="opacity: .8"> <span class="brand-text font-weight-light">MeetGeek.ai (Beta)</span>
			</a>

			<!-- Sidebar -->
			@include('layouts.menu')
			<!-- /.sidebar -->
		</aside>

		<!-- Content Wrapper. Contains page content -->
		@yield('content')
		<!-- /.content-wrapper -->

		<!-- Footer -->
		@include('layouts.footer')
		<!-- /.footer -->

		<!-- Control Sidebar -->
		<aside class="control-sidebar control-sidebar-dark">
			<!-- Control sidebar content goes here -->
		</aside>
		<!-- /.control-sidebar -->
	</div>
	<!-- ./wrapper -->


	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>
		$.widget.bridge('uibutton', $.ui.button)
	</script>
	<!-- Bootstrap 4 -->
	<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="plugins/sparklines/sparkline.js"></script>
	<!-- JQVMap -->
	<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
	<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="plugins/moment/moment.min.js"></script>
	<script src="plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="dist/js/adminlte.js"></script>
	<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
	<script src="dist/js/pages/dashboard.js"></script>
	<!-- AdminLTE for demo purposes -->
	<script src="dist/js/demo.js"></script>
	<script src="dist/js/toastr.min.js"></script>
	<script src="dist/js/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="dist/js/bootstrap3-wysihtml5.all.min.js"></script>
	<script src="dist/js/jquery.easy-autocomplete.min.js"></script>

</body>

</html>