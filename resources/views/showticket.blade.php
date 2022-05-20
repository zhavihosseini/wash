<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <title>پاکیدو | نمایش تیکت </title>
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
    #modd:focus{
        border: none;
        box-shadow: none;
        outline: none;
    }
    #modd:focus-visible{
        border: none;
        box-shadow: none;
        outline: none;
    }
</style>
<body>
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
<!-- ======= Top Bar ======= -->
<section id="topbar" class="d-flex align-items-center container">
    <div class="container d-flex justify-content-center justify-content-md-between">
        <div class="contact-info d-flex align-items-center">
            <i class="fas fa-envelope d-flex align-items-center" style="margin-right: 3px"></i><a href="mailto:paakiido@gmail.com" style="color: black" id="acnt">paakiido@gmail.com</a></i>
            <i class="fas fa-mobile-alt d-flex align-items-center ms-4" style="margin-right: 3px"></i><span id="number">+01732125166</span></i>
        </div>
        <div class="social-links d-none d-md-flex align-items-center">
            <a target="_blank" href="https://www.instagram.com/paakido/?hl=en" class="instagram"><i class="bi bi-instagram" style="font-weight: bold" title="اینستاگرام"></i></a>
        </div>
    </div>
</section><!-- End Top Bar-->

<!-- ======= Header ======= -->
<header id="header" class="d-flex align-items-center">
    <div class="container d-flex justify-content-between">

        <div id="logo">
            <a href="index.html"><img src="{{asset('Untitled-4.png')}}" height="60px"></a>
        </div>

        <nav id="navbar" class="navbar">
            <ul>
                <li><a class="nav-link scrollto" href="{{route('index')}}#prices" title="prices">لیست قیمت<i class="fas fa-clipboard-list"></i></a></li>
                <li><a class="nav-link scrollto" href="<?php echo route('ticket')?>" title="Support" style="color: #50d8af">تیکت پشتیبانی<i class="fas fa-headset"></i></a></li>
                @if (Route::has('login'))
                    @auth
                        <li><a href="{{route('dashboard')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr">داشبورد<i class="fas fa-sign-in-alt"></i></a></li>
                        <li><a href="{{route('index')}}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr" style="font-size: 17px;">خانه<i class="fas fa-home"></i></a></li>

                    @else
                        <li><a href="{{ route('login') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr">ورود<i class="fas fa-user"></i></a></li>
                        @if (Route::has('register'))
                            <li><a href="{{ route('register') }}" class="text-sm text-gray-700 underline nav-link scrollto" id="ahr">ثبت نام<i class="fas fa-user-plus"></i></a></li>
                        @endif
                    @endif
                @endif

                @if(Route::has('login'))
                    @auth
                        <li><a href="<?php echo route('myshoppingcart')?>" class="text-sm text-gray-700 underline nav-link scrollto" style="padding-left: 17px;padding-top: 7px"><button type="button" class="btn" style="padding: 0px;">
                                    <span class="badge bg-danger" style="color: white;font-family: BNazanin;font-weight: bold;font-size: 11px">{{$shopcount}}</span> <span class="spc" style="font-size: 15px">سبد خرید</span>
                                </button></a></li>
                    @else
                        <li>
                            <button class="custom-btn btn-11" title="همین الان سفارش خودتون رو ثبت کنید"> !! سفارش سریع</button>
                        </li>
                    @endif
                @endif
            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->
    </div>
</header><!-- End Header -->
<!-- ======= Portfolio Section ======= -->
<section id="services" style="margin-top: 25px;border: 0px" class="container">
    <div class="container" data-aos="fade-up">
        <div class="card-header" style="box-shadow: 0px 0px 2px 1px lightgray">
            <h4><span style="font-family: BNazanin;padding: 5px;color: red"></span>تیکت های شما</h4>
            <span>کاربر : {{$name}}</span>
        </div>
        @foreach($giv as $ti)
            @php
            $topic = $ti['topic'];
            $code = $ti['code'];
            $importance = $ti['importance'];
            $title = $ti['title'];
            $content = $ti['content'];
            $status = $ti['status'];
            $time = $ti['time'];
            $ansr = $ti['ansr'];
            @endphp
        <div class="card-body" style="box-shadow: 0px 0px 2px 1px lightgray">
            <P style="direction: rtl" > وضعیت : @if($status == 'opened')<span style="padding: 10px;color: green;">
                    باز
                </span>
            @else
                    <span style="padding: 10px;color: red;">
                   بسته
                </span>
                @endif
            </P>
            <div class="row">
            <P style="direction: rtl" class="col-md-3"> موضوع : <span style="padding: 10px">
                    {{$topic}}
                </span></P>
            <P style="direction: rtl" class="col-md-3">کد تیکت :  <span style="padding: 10px">
                    {{$code}}
                </span></P>
                <P style="direction: rtl" class="col-md-3"> اهمیت تیکت : <span style="padding: 10px">
                    {{$importance}}
                </span>
                </P>
                <P style="direction: rtl" class="col-md-3">زمان ارسال : <span style="padding: 10px">
                    {{$time}}
                </span></P>
            </div>
            <div class="row">
                <P style="direction: rtl" class="col-md-12">عنوان :  <span style="padding: 10px">
                    {{$title}}
                </span></P>
            </div>
            <div class="row">
                <P style="direction: rtl" class="col-md-12">محتوا : <span style="padding: 10px">
                    {{$content}}
                </span></P>
            </div>
            <div class="row">
                <P style="direction: rtl" class="col-md-12">وضعیت پاسخ :<span style="padding: 10px">
                    @if($ansr == 'read')
                        <span style="color: green">پاسخ داده شد</span>
                        @else
                        <span style="color: black"> در انتظار ...</span>
                        @endif
                </span></P>
            </div>
        </div>
            <br>
        @endforeach
        {{--<table class="table table-bordered" style="text-align: center">
            <thead>
            <tr>
                <th>باز کردن تیکت</th>
                <th>وضعیت پاسخ</th>
                <th>بروز رسانی</th>
                <th>اهمیت</th>
                <th>وضعیت</th>
                <th>بخش</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ticket as $ti)
                @php
                    $id = $ti['id'];
                        $topic = $ti['topic'];
                        $code = $ti['code'];
                        $importance = $ti['importance'];
                        $title = $ti['title'];
                        $content = $ti['content'];
                        $status = $ti['status'];
                        $time = $ti['time'];
                        $ansr = $ti['ansr'];
                        $hash = new \Hashids\Hashids();
                         $enc = $hash->encode($id);
                        $crypt = \Illuminate\Support\Facades\Crypt::encrypt($enc);


                @endphp
                <tr>
                    <th><form method="get" action="<?php echo route('showticket',['hash'=>$crypt])?>">
                            @csrf
                            <input type="submit" name="open" value="باز کردن">
                        </form></th>
                    <th><span style="direction: rtl" class="col-md-12"><span style="padding: 10px">
                    @if($ansr == 'read')
                                    <span style="color: green">پاسخ داده شد</span>
                                @else
                                    <span style="color: black;direction: rtl">... در انتظار </span>
                                @endif
                </span></span></th>
                    <th>{{$time}}</th>
                    <th>{{$importance}}</th>
                    <th><span style="direction: rtl" > @if($status == 'opened')<span style="padding: 10px;color: green;">
   باز
</span>
                            @else
                                <span style="padding: 10px;color: red;">
  بسته
</span>
                            @endif
       </span> </th>

                    <th>{{$topic}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>--}}
</section>
<div class="container" data-aos="fade-up">
    <div class="card-header">
        <h4 style="text-align: right">پاسخ ادمین</h4>
    </div>
    <div class="card-body">
        @if(empty($reply))
            <p style="direction: rtl" class="col-md-6">در انتظار پاسخ</p>
            @else
         @foreach($reply as $rep)
               @php
                   $text = $rep['text'];
                   $time = $rep['time'];
                   $code = $rep['code'];
               @endphp
               <div class="card-body" style="background-color: #d3ffd1;text-align: right">
                   {!! html_entity_decode($text) !!}
                   <div class="row">
                       <P style="direction: rtl" class="col-md-6">کد تیکت :  <span style="padding: 10px">
          {{$code}}
       </span></P>
                       <P style="direction: rtl" class="col-md-6">زمان ارسال پاسخ :  <span style="padding: 10px">
          {{$time}}
       </span></P>
                   </div>
               </div>
               <br>
           @endforeach
            @endif
    </div>
</div>
</div>
</body>
@include('footer')
<a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
<!-- Vendor JS Files -->
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
</body>
</html>
