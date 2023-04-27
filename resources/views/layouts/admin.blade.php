<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Dashboard 2</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('/backend/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
  <link rel="stylesheet" type="text/css" href="{{ asset('backend/plugins/toastr/toastr.css') }}">
  
</head>
<body>
    <div class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
    @guest
    @else    
    
   
  <!-- Preloader -->
  <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__wobble" src="dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
  </div>

  <!-- Navbar start -->
@include('layouts.admin_partial.navbar')
  <!-- /.navbar  end-->

  <!-- Main Sidebar start -->
  @include('layouts.admin_partial.sidebar')
  <!-- Main Sidebar end -->

  @endguest
@yield('admin_content')
  
  <!-- /.content-wrapper -->

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
 
</div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="{{ asset('/backend/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap -->
<script src="{{ asset('/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('/backend/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('/backend/dist/js/adminlte.js')}}"></script>

<!-- PAGE PLUGINS -->
<!-- jQuery Mapael -->
<script src="{{ asset('/backend/plugins/jquery-mousewheel/jquery.mousewheel.js')}}"></script>
<script src="{{ asset('/backend/plugins/raphael/raphael.min.js')}} "></script>
<script src="{{ asset('/backend/plugins/jquery-mapael/jquery.mapael.min.js') }} "></script>
<script src="{{ asset('/backend/plugins/jquery-mapael/maps/usa_states.min.js')}}"></script>
<!-- ChartJS -->
<script src=" {{ asset('/backend/plugins/chart.js/Chart.min.js') }}"></script>

<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="{{ asset('/backend/dist/js/pages/dashboard2.js') }}"></script>
<script src="{{ asset('/backend/plugins/toastr/toastr.min.js') }}"></script>
<script src="{{ asset('/backend/plugins/sweetalert/sweetalert.min.js') }}"></script>

<script>  
  $(document).on("click", "#delete", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to delete?",
           text: "Once Delete, This will be Permanently Delete!",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Safe Data!");
           }
         });
     });
</script>
{{-- before  logout showing alert message --}}
<script>  
  $(document).on("click", "#logout", function(e){
      e.preventDefault();
      var link = $(this).attr("href");
         swal({
           title: "Are you Want to logout?",
           text: "",
           icon: "warning",
           buttons: true,
           dangerMode: true,
         })
         .then((willDelete) => {
           if (willDelete) {
                window.location.href = link;
           } else {
             swal("Not Logout!");
           }
         });
     });
</script>


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
</body>
</html>
