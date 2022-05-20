<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <title>پاکیدو | سبد خرید</title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <!-- Template Main CSS File -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet">

    <!-- =======================================================
    * Template Name: Reveal - v4.1.0
    * Template URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    * Author: BootstrapMade.com
    * License: https://bootstrapmade.com/license/
    ======================================================== -->
</head>
<style>
    #snackbar1 {
        visibility: hidden;
        min-width: 250px;
        background-color: green;
        color: #fff;
        text-align: center;
        border-radius: 2px;
        padding: 16px;
        position: fixed;
        z-index: 1;
        bottom: 30px;
        font-size: 17px;
        margin: 10px;
    }

    #snackbar1.show {
        visibility: visible;
        -webkit-animation: fadein 0.5s, fadeout 0.5s 2.5s;
        animation: fadein 0.5s, fadeout 0.5s 2.5s;
    }

    @-webkit-keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @keyframes fadein {
        from {bottom: 0; opacity: 0;}
        to {bottom: 30px; opacity: 1;}
    }

    @-webkit-keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }

    @keyframes fadeout {
        from {bottom: 30px; opacity: 1;}
        to {bottom: 0; opacity: 0;}
    }
</style>
<body>
@if(!empty($header))
@foreach($header as $head)
    @php
        $text = $head['text'];
    $link = $head['link'];
    @endphp
    <a href="{{$link}}">
        <div class="text-center" id="gradient" style="background-color: black;direction: rtl;color: white;padding: 10px 4px;font-size: 18px;font-weight: bold">
            <span>{{$text}}</span>
        </div>
    </a>
@endforeach
@endif
<div class="container-fluid fixed-top" style="background-color: orange;padding:0.5px 0px">
</div>
<section id="topbar" class="d-flex align-items-center container-fluid" style="background-color: #f4f0f4">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            {{--   @if (Route::has('login'))
                   @auth
                       <li><a href="{{route('dashboard')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="Dashboard">داشبورد<i class="fas fa-sign-in-alt"></i></a></li>
                   @else
                       <a href="{{ route('login') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="ورود">ورود</a>
                       @if (Route::has('register'))
                           <a href="{{ route('register') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="ثبت نام">ثبت نام</a>
                       @endif
                   @endif
               @endif--}}
            @if (Route::has('login'))
                @auth
                    <a href="{{route('dashboard')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="داشبورد" style="color: black">داشبورد</a>
                @else
                    <a href="{{route('register')}}" id="btnvi"><i class="far fa-user" style="padding: 5px"></i><span style="font-size: 14px;padding: 5px"> ثبت نام / ورود </span></a>
                @endif
            @endif
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            {{--<form method="get" action="<?php echo route('index')?>#prices">
                @csrf
                <button type="submit" class="custom-btn btn-11" title="همین الان سفارش بدید">ثبت سفارش</button>
            </form>  --}}
            <a class="nav-link scrollto" id="bnt" href="{{route('index')}}#prices" title="لیست قیمت">لیست قیمت<i class="fas fa-clipboard-list" style="padding-left: 5px"></i></a>
            <a class="nav-link scrollto " href="<?php echo route('tickett')?>" title="تیکت پشتیبانی">تیکت پشتیبانی<i class="fas fa-headset" style="padding-left: 5px"></i></a>
            <a class="nav-link scrollto " href="<?php echo route('tickett')?>" title="تیکت پشتیبانی">سوالات متداول<i class="fas fa-question" style="padding-left: 5px"></i></a>
        </div>
    </div>
</section>
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">
        <nav id="navbar" class="navbar">
            <ul>
                {{--
                                <li><a class="nav-link scrollto" href="#prices" title="prices">لیست قیمت<i class="fas fa-clipboard-list"></i></a></li>
                                <li><a class="nav-link scrollto " href="<?php echo route('tickett')?>" title="Support">تیکت پشتیبانی<i class="fas fa-headset"></i></a></li>
                --}}
                {{--  @if (Route::has('login'))
                      @auth
                          <li><a href="{{route('dashboard')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="Dashboard">داشبورد<i class="fas fa-sign-in-alt"></i></a></li>
                          <li><a href="{{route('index')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" style="font-size: 17px;color: #50d8af" title="Home">خانه<i class="fas fa-home"></i></a></li>

                      @else
                          <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="login">ورود<i class="fas fa-user"></i></a></li>
                          @if (Route::has('register'))
                              <li><a href="{{ route('register') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" title="signup">ثبت نام<i class="fas fa-user-plus"></i></a></li>
                          @endif
                      @endif
                  @endif--}}

                @if(Route::has('login'))
                    @auth
                        <li><a href="#" class="text-sm text-gray-700 underline nav-link scrollto" style="padding-left: 17px;padding-top: 7px"><button type="button" class="btn" style="padding: 0px;">
                                    <span class="badge" style="color: red;font-family: BNazanin;font-weight: bold;font-size: 15px">{{$count}}</span> <span class="spc" style="color:#343337;font-size: 15px"> سبد خرید<i class="fas fa-shopping-cart"></i></span>
                                </button></a></li>
                        {{-- <li><a href="#" class="text-sm text-gray-700 underline nav-link scrollto" style="padding-left: 17px;padding-top: 7px"><button type="button" class="btn" style="padding: 0px;">
                                     <span class="badge" style="color: red;font-family: BNazanin;font-weight: bold;font-size: 11px">{{$count}}</span> <span class="spc" style="color: orange;font-size: 15px"> سبد خرید<i class="fas fa-shopping-cart"></i></span>
                                 </button></a></li>
                         <li><a href="<?php echo route('myshoppingcart')?>" class="text-sm text-gray-700 underline nav-link scrollto" style="padding-left: 17px;padding-top: 7px"><button type="button" class="btn" style="padding: 0px;">
                                     <span class="badge bg-danger" style="color: white;font-family: BNazanin;font-weight: bold;font-size: 11px">{{$shopcount}}</span> <span class="spc" style="font-size: 15px">سبد خرید</span>
                                 </button></a></li>--}}
                    @else
                        <li>
                            <form method="get" action="<?php echo route('index')?>#prices">
                                @csrf
                                <button type="submit" class="custom-btn btn-11" title="Order Now!"> !! سفارش سریع</button>
                            </form>
                        </li>
                    @endif
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div id="logo">
            <a href="{{route('index')}}"><img src="{{asset('Untitled-4.png')}}" height="60px" title="paakido"></a>
        </div>
    </div>
</header>
<section id="services" class="container" style="margin-top: 5px;border: 0px;margin-bottom: 0px">
    <div class="container">
        <div class="card-header" style="margin: 0px;border: 3px dashed orange;padding: 10px;background-color: transparent;border-radius: 25px">
            <div class="row" style="margin: 0px">
            <p class="col" style="color: black;font-family: Yekan;font-weight: bold;margin: 0px;font-size: 18px;direction: rtl;text-align: left"><span style="font-family: BNazanin;color: red;padding: 5px">
                    @if (empty($all))<span>0</span>@else{{$newprice}}@endif</span>تومان</p>
            <p class="col" style="color: black;font-family: Yekan;font-weight: bold;margin: 0px;font-size: 17px"> : مجموع خرید شما<span style="font-family: BNazanin;color: red;padding: 5px"></span></p>
            </div>
        </div>
    </div>
</section>
<section id="services" style="margin-top: 0px;border: 0px;padding-top: 0px" class="card-body">
    <div class="container">
        <section id="services" style="margin-top: 25px;border: 0px">
            <div class="container">
                @if(empty($all))
                    <p>سبد خرید شما خالی است</p>
                @else
                    @foreach($all as $pp)
                        @php
                            $id = $pp['product'][0]['id'];
                            $icon = $pp['product'][0]['icon'];
                            $title = $pp['product'][0]['title'];
                            $nonint = $pp['product'][0]['nonint'];
                            $price = $pp['product'][0]['price'];
                            $count = $pp['shoping']['count'];
                            $shopid = $pp['shoping']['id'];
                        @endphp
                        <div class="columns" style="border: 1px solid lightgrey;border-radius: 15px;margin: 0px 5px">
                            <ul class="price">
                                <li class="header" id="hdr"><img src="{{$icon}}"></li>
                                <li id="titles">{{$title}}</li>
                                <li class="grey" id="gry"><p style="margin: 0px"><p id="pup">{{$nonint}}</p><p style="margin: 0px">{{$price}} تومان </p></li>
                                <li class="bg-white">
                                    <button style="width: 100%;background-color: lightgray;color: black" id="btn">به سبد خرید شما اضافه شد</button>
                                </li>
                                <div class="row">
                                    <form method="post" action="<?php echo route('savecount')?>" class="col-md-12">
                                        @csrf
                                        <input type="hidden" name="shopid" value="{{$shopid}}">
                                        <input type="number" name="count" value="{{$count}}" min="1" max="100" class="col-md-12" style="margin-bottom: 5px;border-radius: 0px;border: none;width: 100%;text-align: center">
                                        <input type="submit" name="sub" value="آپدیت" class="col-md-12" style="width: 100%;margin-bottom: 5px;background-color: #0a58ca;color: white;border-radius: 0px;outline: none;border: none;border-radius: 20px">
                                    </form>
                                    <form method="post" action="<?php echo route('delteshoppingcart')?>">
                                        @csrf
                                        <input type="hidden" name="shopid" value="{{$shopid}}">
                                        <input type="submit" name="delete" value="حذف" class="col-md-12" style="width: 100%;border: none;background-color: red;color: white;border-radius: 0px;outline: none;border-radius: 20px;">
                                    </form>
                                </div>
                            </ul>
                        </div>
                    @endforeach
                @endif
            </div>
        </section>
@if(empty($all))

@else
           هزینه ی ارسال به گرگان 5000 هزار تومان می باشد
<section style="margin-top: 25px;border: 0px" class="container">
    <br>
    <div class="container">
        <div class="container text-center">
            <div class="row" style="margin: 0px">
                <div class="col-sm">
                   <a href="{{route('index')}}#prices"><button style="padding: 5px 20px;border: 0px;outline: none;color: white;background-color: grey;margin: 5px;width: 100%;font-size: 20px">ادامه ی خرید</button></a>
                </div>
                <div class="col-sm">
                    @if(!empty($status))
                    @if($status == 'taiid')
                    <form method="get" action="<?php echo route('payment')?>">
                        @csrf
                        <input type="hidden" name="price" value="{{$newprice}}">
                        <button type="submit" style="padding: 5px 20px;border: 0px;outline: none;color: white;background-color: green;margin: 5px;width: 100%;font-size: 20px">پرداخت</button>
                    </form>
                        @else
                            <button type="submit" class="disabled" style="padding: 5px 20px;border: 0px;outline: none;color: white;background-color: lightgray;margin: 5px;width: 100%;font-size: 20px;cursor: not-allowed">هویت شما تایید نشده است</button>
                        @endif
                        @endif
                </div>
            </div>
        </div>
    </div>
</section>
    </div>
</section>
@endif
</body>
@include('footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
@if(session('success'))
    <div class="container-fluid float-left" id="snackbar1"><strong>{{ session('success') }}</strong></div>
@endif
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<script src="{{asset('vendor/aos/aos.js')}}"></script>
<script src="{{asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('vendor/glightbox/js/glightbox.min.js')}}"></script>
<script src="{{asset('vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
<script src="{{asset('vendor/php-email-form/validate.js')}}"></script>
<script src="{{asset('vendor/swiper/swiper-bundle.min.js')}}"></script>
<!-- Template Main JS File -->
<script src="{{asset('js/main.js')}}"></script>
<script>
    var x = document.getElementById("snackbar1");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
</script>
</html>
