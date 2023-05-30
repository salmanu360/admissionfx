<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
	<title>GrabVisa Application - Dashboard </title>
	<link rel="icon" type="image/x-icon" href="{{asset('modern-light-menu/assets/img/favicon.ico')}}"/>
	<link href="{{asset('modern-light-menu/assets/css/loader.css')}}" rel="stylesheet" type="text/css" />
	<script src="{{asset('modern-light-menu/assets/js/loader.js')}}"></script>

	<!-- BEGIN GLOBAL MANDATORY STYLES -->
	<link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
	<link href="{{asset('modern-light-menu/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
	<link href="{{asset('modern-light-menu/assets/css/plugins.css')}}" rel="stylesheet" type="text/css" />
	<!-- END GLOBAL MANDATORY STYLES -->

	<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<link href="{{asset('modern-light-menu/plugins/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
	<link href="{{asset('modern-light-menu/assets/css/dashboard/dash_2.css')}}" rel="stylesheet" type="text/css" />
	<!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
	<!-- BEGIN PAGE LEVEL STYLES -->
	<link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/table/datatable/datatables.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/table/datatable/dt-global_style.css')}}">
	<link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/table/datatable/custom_dt_multiple_tables.css')}}">
	<!-- END PAGE LEVEL STYLES -->
	<!-- END PAGE LEVEL STYLES -->
	<link rel="stylesheet" href="{{asset('modern-light-menu/plugins/font-icons/fontawesome/css/regular.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
	<link rel="stylesheet" href="{{asset('modern-light-menu/plugins/flatpickr/flatpickr.css')}}" type="text/css">
	<link href="{{asset('modern-light-menu/assets/css/users/user-profile.css')}}" rel="stylesheet" type="text/css" />
	@yield('css')
</head>
<body class="alt-menu sidebar-noneoverflow">
<!-- BEGIN LOADER -->
<div id="load_screen"> <div class="loader"> <div class="loader-content">
			<div class="spinner-grow align-self-center"></div>
		</div></div></div>
<!--  END LOADER -->

<!--  BEGIN NAVBAR  -->
@include('application.partials.header')
<!--  END NAVBAR  -->

<!--  BEGIN MAIN CONTAINER  -->
<div class="main-container" id="container">

	<div class="overlay"></div>
	<div class="search-overlay"></div>

	<!--  BEGIN TOPBAR  -->
@include('application.partials.navigation')
<!--  END TOPBAR  -->

	<!--  BEGIN CONTENT PART  -->
	<div id="content" class="main-content">
		<div class="layout-px-spacing">
			@yield('content')
		</div>
	</div>
	<!--  END CONTENT PART  -->
	{{-- <div class="footer-wrapper">
        <div class="footer-section f-section-1">
            <p class="">Copyright © 2021 <a target="_blank" href="https://designreset.com">DesignReset</a>, All rights reserved.</p>
        </div>
        <div class="footer-section f-section-2">
            <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
        </div>
    </div> --}}
</div>
<!-- END MAIN CONTAINER -->

<!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
<script src="{{asset('modern-light-menu/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
<script src="{{asset('modern-light-menu/bootstrap/js/popper.min.js')}}"></script>
<script src="{{asset('modern-light-menu/bootstrap/js/bootstrap.min.js')}}"></script>
<script src="{{asset('modern-light-menu/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
<script src="{{asset('modern-light-menu/assets/js/app.js')}}"></script>
<script>
	$(document).ready(function() {
		App.init();
	});
</script>
<script src="{{asset('modern-light-menu/assets/js/custom.js')}}"></script>
<!-- END GLOBAL MANDATORY SCRIPTS -->
{{-- {{asset('modern-light-menu/')}} --}}
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<script src="{{asset('modern-light-menu/plugins/apex/apexcharts.min.js')}}"></script>
<script src="{{asset('modern-light-menu/assets/js/dashboard/dash_2.js')}}"></script>
<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- BEGIN PAGE LEVEL SCRIPTS -->
<script src="{{asset('modern-light-menu/plugins/table/datatable/datatables.js')}}"></script>
<script>
	$(document).ready(function() {
		$('table.multi-table').DataTable({
			"oLanguage": {
				"oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
				"sInfo": "Showing page _PAGE_ of _PAGES_",
				"sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
				"sSearchPlaceholder": "Search...",
				"sLengthMenu": "Results :  _MENU_",
			},
			"stripeClasses": [],
			"lengthMenu": [7, 10, 20, 50],
			"pageLength": 7,
			drawCallback: function () {
				$('.t-dot').tooltip({ template: '<div class="tooltip status" role="tooltip"><div class="arrow"></div><div class="tooltip-inner"></div></div>' })
				$('.dataTables_wrapper table').removeClass('table-striped');
			}
		});
	} );
</script>
<!-- END PAGE LEVEL SCRIPTS -->
@yield('js')
</body>
</html>