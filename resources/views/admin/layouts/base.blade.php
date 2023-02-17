<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sparkles ">
    <title>Sparkles -- @yield('title') </title>
    
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/logo.png')}}">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    <link href="{{asset('css/owl.carousel.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('css/owl.theme.default.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="{{asset('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/themify-icons.css')}}">
    <link href="{{asset('css/ionicons.min.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/et-line.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/feather.css')}}" rel="stylesheet"/>
    <link href="{{asset('css/flag-icon.min.css')}}" rel="stylesheet"/>
    <script src="{{asset('js/modernizr-2.8.3.min.js')}}"></script>
    <script src="{{asset('js/jquery.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <link rel="stylesheet" href="{{asset('css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/am-charts/css/am-charts.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('vendors/charts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-table/css/jquery.dataTables.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-table/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-table/css/responsive.bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('vendors/data-table/css/responsive.jqueryui.min.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="//db.onlinewebfonts.com/c/79927a8d010a79419f5c30e4d87409d5?family=Visby+CF+Medium" rel="stylesheet" type="text/css"/>
                

</head>
<body>



    <div class="page-container">

        <!--=========================*
                 Side Bar Menu
        *===========================-->
        @include('admin.layouts.sidebar')
       
        <div class="main-content page-content">
    
            @include('admin.layouts.header')
    
            
            @yield('content')
           
        </div>
       
        <footer>
            <div class="footer-area">
                <p>&copy; Copyright {{date('Y')}}. All right reserved.</p>
            </div>
        </footer>
        <!--=================================*
                    End Footer Section
        *===================================-->
    
</div>

<script src="{{asset('js/owl.carousel.min.js')}}"></script>
<script src="{{asset('js/metisMenu.min.js')}}"></script>
<script src="{{asset('js/jquery.slimscroll.min.js')}}"></script>
<script src="{{asset('js/jquery.slicknav.min.js')}}"></script>
<script src="{{asset('vendors/am-charts/js/ammap.js')}}"></script>
<script src="{{asset('vendors/am-charts/js/worldLow.js')}}"></script>
<script src="{{asset('vendors/am-charts/js/continentsLow.js')}}"></script>
<script src="{{asset('vendors/am-charts/js/light.js')}}"></script>
<script src="{{asset('js/am-maps.js')}}"></script>
<script src="{{asset('vendors/charts/float-bundle/jquery.flot.js')}}"></script>
<script src="{{asset('vendors/charts/float-bundle/jquery.flot.pie.js')}}"></script>
<script src="{{asset('vendors/charts/float-bundle/jquery.flot.resize.js')}}"></script>
<script src="{{asset('vendors/charts/sparkline/easy-pie-chart.js')}}"></script>
<script src="{{asset('vendors/charts/sparkline/sparklines.js')}}"></script>
<script src="{{asset('vendors/apex/js/apexcharts.min.js')}}"></script>
<script src="{{asset('vendors/data-table/js/jquery.dataTables.js')}}"></script>
<script src="{{asset('vendors/data-table/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('vendors/data-table/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('vendors/data-table/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('vendors/data-table/js/responsive.bootstrap.min.js')}}"></script>

<!-- Data table Init -->
<script src="{{asset('js/init/data-table.js')}}"></script>
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>
<script src="{{asset('js/myscript.js')}}"></script>

<script>
    $('#summernote').summernote({
    //   placeholder: 'Hello Bootstrap 4',
      tabsize: 2,
      height: 300
    });
  </script>


{{-- if success --}}
@if (session('success'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'success',
        title: 'Done',
        text: '{{session('success')}}',
        showConfirmButton: true,
        timer: 5000
    })
    </script>
@endif

{{-- if error --}}
@if (session('error'))
<script>
    Swal.fire({
        position: 'center',
        icon: 'error',
        title: 'Error',
        text: '{{session('error')}}',
        showConfirmButton: true,
        timer: 5000
    })
    </script>
@endif
</body>
</html>
