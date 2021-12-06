<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="A fully featured admin theme which can be used to build CRM, CMS, etc.">
        <meta name="author" content="Coderthemes">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="shortcut icon" href="{{ asset('backend/images/favicon_1.ico') }}">

        <title> @yield('title') </title>

        <!-- Base Css Files -->
        <link href="{{ asset('backend/css/bootstrap.min.css') }}" rel="stylesheet" />

        <!-- Font Icons -->
        <link href="{{ asset('backend/assets/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/assets/ionicon/css/ionicons.min.css') }}" rel="stylesheet" />
        <link href="{{ asset('backend/css/material-design-iconic-font.min.css') }}" rel="stylesheet">

        <!-- animate css -->
        <link href="{{ asset('backend/css/animate.css') }}" rel="stylesheet" />

        <!-- Waves-effect -->
        <link href="{{ asset('backend/css/waves-effect.css') }}" rel="stylesheet">

        <!-- sweet alerts -->
        <link href="{{ asset('backend/assets/sweet-alert/sweet-alert.min.css') }}" rel="stylesheet">
        <!-- Toastr -->
      <link rel="stylesheet" type="text/css" href="{{ asset('alert/toastr.css') }}">

      <!-- DataTables -->
        <link href="{{ asset('backend/assets/datatables/jquery.dataTables.min.css') }}" rel="stylesheet"/>

        <!-- Custom Files -->
        <link href="{{ asset('backend/css/helper.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" type="text/css" />

        <script src="{{ asset('backend/js/modernizr.min.js') }}"></script>
        
    </head>

    <body class="fixed-left">
        
        <!-- Begin page -->
        <div id="wrapper">
        
            <!-- ========== Top bar Start ========== -->
               @if(!Request::is('register'))
                  @include('backend.partials.topbar')
               @endif
            <!-- Top Bar End -->


            <!-- ========== Left Sidebar Start ========== -->
               @if(!Request::is('register'))
                  @include('backend.partials.leftsidebar')
               @endif
            <!-- Left Sidebar End --> 



            <!-- ============================================================== -->
            <!-- Start Content here -->
            <!-- ============================================================== -->
                <div class="content-page">
                    <!-- Start content -->
                    <div class="content">
                        <div class="container">
                            
                            @yield('adminContent')
                            
                        </div> <!-- container -->
                    </div> <!-- content -->
                    <footer class="footer">
                        <a href="#">Developed by Md Majharul Islam</a>
                        <p class="pull-right">2021 © Inventory Management.</p>
                    </footer>
                </div>
            <!-- ============================================================== -->
            <!-- End content here -->
            <!-- ============================================================== -->


            <!-- Right online Sidebar -->
                @include('backend.partials.rightsidebar')
            <!-- /Right-bar -->

        </div>
        <!-- END wrapper -->


    
        <script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="{{ asset('backend/js/jquery.min.js') }}"></script>
        <script src="{{ asset('backend/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('backend/js/waves.js') }}"></script>
        <script src="{{ asset('backend/js/wow.min.js') }}"></script>
        <script src="{{ asset('backend/js/jquery.nicescroll.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/js/jquery.scrollTo.min.js') }}"></script>
        <script src="{{ asset('backend/assets/chat/moment-2.2.1.js') }}"></script>
        <script src="{{ asset('backend/assets/jquery-sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('backend/assets/jquery-detectmobile/detect.js') }}"></script>
        <script src="{{ asset('backend/assets/fastclick/fastclick.js') }}"></script>
        <script src="{{ asset('backend/assets/jquery-slimscroll/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('backend/assets/jquery-blockui/jquery.blockUI.js') }}"></script>

        <!-- sweet alerts -->
        <script src="{{ asset('backend/assets/sweet-alert/sweet-alert.min.js') }}"></script>
        <script src="{{ asset('backend/assets/sweet-alert/sweet-alert.init.js') }}"></script>
        <!-- Toastr -->
        <script src="{{ asset('alert/toastr.min.js') }}"></script>

        <!-- DataTables -->
        <script src="{{ asset('backend/assets/datatables/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('backend/assets/datatables/dataTables.bootstrap.js') }}"></script>

        <!-- flot Chart -->
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.tooltip.min.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.resize.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.selection.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('backend/assets/flot-chart/jquery.flot.crosshair.js') }}"></script>

        <!-- Counter-up -->
        <script src="{{ asset('backend/assets/counterup/waypoints.min.js') }}" type="text/javascript"></script>
        <script src="{{ asset('backend/assets/counterup/jquery.counterup.min.js') }}" type="text/javascript"></script>
        
        <!-- CUSTOM JS -->
        <script src="{{ asset('backend/js/jquery.app.js') }}"></script>

        <!-- Dashboard -->
        <script src="{{ asset('backend/js/jquery.dashboard.js') }}"></script>

        <!-- Chat -->
        <script src="{{ asset('backend/js/jquery.chat.js') }}"></script>

        <!-- Todo -->
        <script src="{{ asset('backend/js/jquery.todo.js') }}"></script>

        <script type="text/javascript">
            /* ==============================================
            Counter Up
            =============================================== */
            jQuery(document).ready(function($) {
                $('.counter').counterUp({
                    delay: 100,
                    time: 1200
                });
            });
        </script>

        <!-- DataTables -->
        <script type="text/javascript">
            $(document).ready(function() {
                $('#datatable').dataTable();
            } );
        </script>

        <!-- Taoster alert -->
        <script>
         @if(Session::has('messege'))
              var type="{{Session::get('alert-type','info')}}"
              switch(type){
                case 'info':
                     toastr.info("{{ Session::get('messege') }}");
                     break;
                case 'success':
                    toastr.success("{{ Session::get('messege') }}");
                    break;
                case 'warning':
                   toastr.warning("{{ Session::get('messege') }}");
                    break;
                case 'error':
                    toastr.error("{{ Session::get('messege') }}");
                    break;
              }
            @endif
        </script>

        <!-- Sweet alert -->
          <script>
            $(document).on("click", "#delete", function(e){
                e.preventDefault();
                 var link = $(this).attr("href");
                 swal({
                  title: "Are you sure?",
                  text: "You will not be able to recover this data!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonClass: "btn-danger",
                  cancelButtonClass: "btn-info",
                  confirmButtonText: "Yes, delete it!",
                  cancelButtonText: "No, cancel!",
                  closeOnConfirm: false,
                  closeOnCancel: false,
                },
                function(isConfirm) {
                  if (isConfirm) {
                    swal("Deleted!", "Your imaginary file has been deleted.", "success");
                    window.location.href = link;
                  } else {
                    swal("Cancelled", "Your imaginary file is safe !", "error");
                  }
                });
               });
          </script>
    </body>
</html>