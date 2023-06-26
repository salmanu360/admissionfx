
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>University Bureau Admin - Dashboard </title>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" 
     href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <style>
        /* footer study destination */


        .study-destinaton-section {
            background-color: #fff;
        }

        .studydes_head {
            text-align: center;
            margin-bottom: 2rem;
        }

        .studydes_main {
            width: 100%;
            padding: 2rem 1rem;
        }

        .studydes-container {
            display: flex;
            justify-content: space-evenly;
        }

        .studydes-container a {
            text-decoration: none;
            color: #000;
        }

        .studydes-card {
            text-align: center;
        }

        .study-destinaton-section .owl-dots {
            display: none;
        }

        .studydes-card img {
            width: 150px !important;
            margin: auto;
            transition: all 0.4s ease-in-out;
        }

        .studydes-card h6 {
            transition: all 0.4s ease-in-out;
            border-radius: 10px;
            padding: 5px;
        }

        .studydes-card:hover img {
            margin-top: -6px;
            transition: all 0.4s ease-in-out;
        }

        .studydes-card:hover h6 {
            background-color: #191e3a;
            transition: all 0.4s ease-in-out;
            color: #fff;
        }

        .card-title {
            border-bottom: dashed solid #333;
        }

        .media-body-custom {
            display: flex;
            flex-direction: column;
            justify-content: center;
            height: 70px;
        }

        /* footer study destination ends */
    </style>
     <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
        <!-- END GLOBAL MANDATORY STYLES -->
            
        <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
        
        <link rel="stylesheet" type="text/css" href="{{asset('modern-light-menu/plugins/table/datatable/custom_dt_html5.css')}}">
        <!-- END PAGE LEVEL CUSTOM STYLES -->
    @yield('css')
</head>
<body class="alt-menu sidebar-noneoverflow">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
    @include('admin.partials.header')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        @include('admin.partials.navigation')
        <!--  END TOPBAR  -->
        
        <!--  BEGIN CONTENT PART  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @yield('content')

                

            </div>
        </div>
        <!--  END CONTENT PART  -->

        @if(auth()->user()->role == 'rm')
            @php
            $user = \App\Models\User::where('id', auth()->user()->id)->where('lock_user', 1)->first();
            @endphp
        @if($user)
        <div class="modal  show" id="lockrmStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="example-Modal3"> Account Lock</h5>
                    </div>
                    <div class="modal-body">
                        <span class="text text-primary rmRequestSpan"></span>
                        <h6>Your account has been locked by admin, please contact to the admin for furthur procedure</h6>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-success requestUnlockRM"  onclick="requestUnlockRM({{auth()->user()->id}})">Unlock Request</button>
{{--                        <button type="button" class="btn btn-danger" data-dismiss="modal">Logout</button>--}}
                        <form method="POST" action="{{ route('role.logout') }}">
                            @csrf
                            <a class="btn btn-danger" href="{{route('role.logout')}}" onclick="event.preventDefault();this.closest('form').submit();">Log Out</a>
                        </form>
                    </div>
                    </form>
                </div>
            </div>
        </div>
            @endif
            @endif
    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('modern-light-menu/assets/js/libs/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/bootstrap/js/popper.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/plugins/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('modern-light-menu/assets/js/app.js')}}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
      $(function() {
        // Owl Carousel
        var owl = $(".owl-carousel");
        owl.owlCarousel({
          margin: 10,
          loop: true,
          nav: false,
          autoplay: true,
          responsive: {
            0: {
              items: 1
            },
            600: {
              items: 3
            },
            1000: {
              items: 5
            }
          }
        });
      });
    </script>
    <script>
        $(document).ready(function() {
            App.init();


            // $("#lockrmStatus").modal('show');
            $('#lockrmStatus').modal({backdrop: 'static', keyboard: false});



            requestUnlockRM = function (id)
            {
                var SITEURL = '{{ URL::to('') }}';
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    }
                });

                $.ajax({
                    url: SITEURL + "/admin/user/rmUnlockRequest/" + id,
                    type: 'GET',
                    success: function (response)
                    {
                        $('rmRequestSpan').html('Your request for unlock account has been sent to admin.');
                    }
                });
            }
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
                dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
         buttons: {
             buttons: [
                 { extend: 'csv', className: 'btn' },
                 { extend: 'excel', className: 'btn' },
                 { extend: 'print', className: 'btn' }
             ]
         },
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
    
     <script>
     $('#html5-extension').DataTable( {
         dom: '<"row"<"col-md-12"<"row"<"col-md-6"B><"col-md-6"f> > ><"col-md-12"rt> <"col-md-12"<"row"<"col-md-5"i><"col-md-7"p>>> >',
         buttons: {
             buttons: [
                 { extend: 'csv', className: 'btn' },
                 { extend: 'excel', className: 'btn' },
                 { extend: 'print', className: 'btn' }
             ]
         },
         "oLanguage": {
             "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
             "sInfo": "Showing page _PAGE_ of _PAGES_",
             "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
             "sSearchPlaceholder": "Search...",
            "sLengthMenu": "Results :  _MENU_",
         },
         "stripeClasses": [],
         "lengthMenu": [7, 10, 20, 50],
         "pageLength": 7 
     } );
 </script>
 <!-- END PAGE LEVEL CUSTOM SCRIPTS -->
    <!-- END PAGE LEVEL SCRIPTS -->
    
    <!-- ::::::::::::::::::::::::::::::::::: Copy, CSV, Excel, Print  Buttons ::::::::::::::::::::::::::::::::::::::: -->
 <script>
     $(document).ready(function() {
         App.init();
     });
 </script>
 <script src="{{asset('modern-light-menu/assets/js/custom.js')}}"></script>
 <!-- END GLOBAL MANDATORY SCRIPTS -->

 <!-- BEGIN PAGE LEVEL CUSTOM SCRIPTS -->
 <script src="{{asset('modern-light-menu/plugins/table/datatable/datatables.js')}}"></script>
 <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
 <script src="{{asset('modern-light-menu/plugins/table/datatable/button-ext/dataTables.buttons.min.js')}}"></script>
 <script src="{{asset('modern-light-menu/plugins/table/datatable/button-ext/jszip.min.js')}}"></script>    
 <script src="{{asset('modern-light-menu/plugins/table/datatable/button-ext/buttons.html5.min.js')}}"></script>
 <script src="{{asset('modern-light-menu/plugins/table/datatable/button-ext/buttons.print.min.js')}}"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

    
    
    @yield('js')
</body>
</html>