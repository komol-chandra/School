<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" sizes="16x16" href="{{$settings->fav_icon ? '/Backend_assets/Files/Logo/fav_icon/'.$settings->fav_icon  : '/Backend_assets/Backend/images/avter4.png'}}">
    <title>School | @yield('title')</title>
    @include('Backend.layouts.css')
</head>
<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <div id="main-wrapper">
        @include('Backend.layouts.header')
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <div class="scroll-sidebar">
        		@include('Backend.layouts.sidebar')
            </div>
        </aside>
        <div class="page-wrapper">
             <div class="page-breadcrumb">
                <div class="row">
                    <div class="col-12 d-flex no-block align-items-center">
                        <h4 class="page-title">@yield('head')</h4>
                        <div class="ml-auto text-right">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">@yield('head_name')</li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
            	@yield('content')
            </div>
    		@include('Backend.layouts.footer')
        </div>
    </div>
</body>
    @include('Backend.layouts.js')
</html>
