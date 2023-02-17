<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Sparkles ">
    <title>Sparkles - Customer Forgot Password </title>
    
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
    <link rel="stylesheet" href="{{asset('css/metisMenu.css')}}">
    <link rel="stylesheet" href="{{asset('css/slicknav.min.css')}}">
    <link rel="stylesheet" href="{{asset('vendors/am-charts/css/am-charts.css')}}" type="text/css" media="all" />
    <link rel="stylesheet" href="{{asset('vendors/charts/morris-bundle/morris.css')}}">
    <link href="https://fonts.googleapis.com/css?family=Overpass:100,200,300,400,600,700,800,900&display=swap" rel="stylesheet">

</head>
<body>


    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="register-bg">
                    <div class="login-overlay"></div>
                    <div class="login-left">
                        <img src="{{asset('images/logo-trans.png')}}" alt="Logo">
                        <br>
                        {{-- <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam tellus elit.</p> --}}
                        <a href="javascript:void(0);" class="btn btn-primary">Learn More</a>
                    </div><!--login-left-->
                </div><!--login-bg-->

                <div class="login-form">
                    <form method="POST" action="{{route('customer.password.sendResetLink')}}">
                        @csrf
                        {{-- error message --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{-- success message --}}
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        {{-- error message --}}
                        @if (session('error'))
                            <div class="alert alert-danger">
                                {{ session('error') }}
                            </div>
                        @endif
                        <div class="login-form-body">
                           
                            <div class="form-gp">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" name="email" id="exampleInputEmail1">
                                <i class="ti-email"></i>
                            </div>
                            <div class="submit-btn-area">
                                <button id="form_submit" class="btn btn-primary" type="submit">Send Email <i class="ti-arrow-right"></i></button>
                            </div>
                           
                        </div>
                    </form>
                </div><!--login-form-->

            </div><!--row-->
        </div><!--container-fluid-->
    </div><!--wrapper-->


<script src="{{asset('js/jquery.min.js')}}"></script>
<script src="{{asset('js/popper.min.js')}}"></script>
<script src="{{asset('js/bootstrap.min.js')}}"></script>
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
<script src="{{asset('js/home.js')}}"></script>
<script src="{{asset('js/main.js')}}"></script>


</body>
</html>