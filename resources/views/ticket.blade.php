<!DOCTYPE html>
<html lang="fa">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <title>پاکیدو | ارسال تیکت </title>
    <meta content="" name="description">
    <meta content="" name="keywords">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
    <!-- Favicons -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="icon">
    <link href="{{asset('assets/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

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
@include('header')
<section id="services" style="margin-top: 5px;border: 0px" class="container">
    <div class="container">
        <div class="card-header" style="background-color: transparent;border: 3px dashed orange;border-radius: 25px;padding:5px;">
            <h2 style="margin: 0px;font-weight: bold;padding: 8px">ارسال تیکت</h2>
        </div>
        <br>
        <form id="contact-form" class="contact-form" method="post" action="<?php echo route('sendticket')?>">
            <?php
            echo csrf_field();
            ?>
            <div class="row">
                <div class="col-md-6" style="margin-bottom: 25px">
                    <div class="form-group">
                        <label for="importance" style="font-size: 18px;font-weight: bold;margin:5px;direction: rtl">اهمیت تیکت :</label><br>
                        <select class="form-control form-control-sm" id="sl1" name="importance" required>
                            <option class="s3">زیاد</option>
                            <option class="s3">متوسط</option>
                            <option class="s3">کم</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-6" style="margin-bottom: 25px">
                    <div class="form-group">
                        <label for="topic" style="font-size: 18px;font-weight: bold;margin: 5px;direction: rtl">موضوع تیکت :</label><br>
                        <select class="form-control form-control-sm" id="sl1" name="topic" required>
                            <option class="s3">سفارشات</option>
                            <option class="s3">خدمات بعد از سفارش</option>
                            <option class="s3">مشکلات فنی</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12" style="margin-bottom: 25px;text-align: right">
                    <div class="form-group">
                        <input type="text" class="form-control" name="title" autocomplete="off" id="sl2" placeholder="عنوان تیکت" style="text-align: right;border-radius: 0px;height: 45px" max="255" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <textarea class="form-control textarea" rows="3" name="content" id="sl2" placeholder="محتوای تیکت را وارد کنید..." style="text-align: right;border-radius: 0px;" minlength="50" maxlength="255" max="255" required></textarea>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-md-12">
                    <input type="hidden" name="userid" value="{{\Illuminate\Support\Facades\Auth::id()}}">
                    <button type="submit" class="btn btn-dark" style="border-radius: 0px;font-size: 17px">ارسال تیکت</button>
                </div>
            </div>
        </form>
    </div>
</section>
<section id="services" style="margin-top: 25px;border: 0px" class="container">
    <div class="container">
        <div class="card-header" style="background-color: transparent;border: 3px dashed orange;border-radius: 25px;padding:5px;">
            <h2 style="margin: 0px;font-weight: bold;padding: 8px"><span style="font-family: BNazanin;padding: 5px;color: red">{{$count}}</span>تیکت های شما</h2>
        </div>
        <br>
        {{--@foreach($ticket as $ti)
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
        @endforeach--}}
        <table class="table table-bordered" style="text-align: center">
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
</table>
</section>
{{--
<div class="container" data-aos="fade-up">
<div class="section-header">
<h2 style="text-align: right">پاسخ ها</h2>
</div>
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
</div>
</div>
--}}
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
<script>
var x = document.getElementById("snackbar1");
x.className = "show";
setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
</script>
</html>
