<!DOCTYPE html>
<html lang="fa">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <title>پاکیدو | صفحه ی اصلی</title>
    <meta property="og:title" content="پاکیدو | صفحه ی اصلی" />
    <meta name="twitter:title" content="پاکیدو | صفحه ی اصلی" />
    <meta name="description" content="بهترین سرویس خشکشویی آنلاین گلستان همین الان سفارشات خود را ثبت کنید تا در سریع ترین زمان ممکن رسیدگی شود." />
    <meta property="og:description" content="بهترین سرویس خشکشویی آنلاین گلستان همین الان سفارشات خود را ثبت کنید تا در سریع ترین زمان ممکن رسیدگی شود." />
    <meta name="twitter:description" content="بهترین سرویس خشکشویی آنلاین گلستان همین الان سفارشات خود را ثبت کنید تا در سریع ترین زمان ممکن رسیدگی شود." />
    <meta content="بهترین سرویس خشکشویی آنلاین گلستان همین الان سفارشات خود را ثبت کنید تا در سریع ترین زمان ممکن رسیدگی شود" name="description">
    <meta content="paakido,پاکیدو,خشکشویی آنلاین,خشکشویی گرگان,paakidoir,خشکشویی آنلاین پاکیدو,خشکشویی سریع,بهترین خشکشویی" name="keywords">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
    <link href="{{asset('vendor/aos/aos.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">
    <link href="{{asset('vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
    <link href="{{asset('css/style.css')}}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
<div class="text-center" id="gradient" style="background-color: black;direction: rtl;color: white;padding: 10px 4px;font-size: 18px;font-weight: bold" title="click now">
    <span>{{$text}}</span>
</div>
</a>
@endforeach
@include('header')
<main id="main" class="container">
    <section id="services">
        <div class="container" data-aos="fade-up">
            <div class="card-header" style="background-color: transparent;border: 3px dashed orange;border-radius: 25px;padding:5px;">
                <h2 style="margin: 0px;font-weight: bold;padding: 8px">با خیال راحت لباساتو بده پاکیدو</h2>
            </div>
            <div class="row gy-4 card-body">
                <p style="direction: rtl;font-weight: bold;font-size: 17px"> تیم پاکیدو تمام تلاشش را در راستای بهبود خدمات خشکشویی و انجام خدمات پوششی انجام می دهد. امیدواریم بتوانیم رضایت کامل مشتری های عزیز را به همراه بهترین خدمات و بالاترین کیفیت به عمل بیاوریم .</p>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="box">
                        <div class="icon"><i class="fas fa-shipping-fast"></i></div>
                        <h4 class="title"><a>ارسال و تحویل سریع</a></h4>
                        <p class="description" style="direction: rtl;font-size: 17px"> به موقع ترین و سریع ترین تحویل و ارسال لباس های شما در عرض <span style="font-family: BNazanin;font-weight: bold;font-size: 15px">24</span> ساعت. </p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">
                    <div class="box">
                        <div class="icon"><i class="fas fa-funnel-dollar"></i></div>
                        <h4 class="title"><a>ارزان ترین قیمت</a></h4>
                        <p class="description" style="direction: rtl;font-size: 17px">  پاکیدو از لحاظ مالی ارزان ترین خدمات را به شما مشتریان عزیز ارائه می کند. و ارزان تر از ما هیچ جا پیدا نمی کنید.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="300">
                    <div class="box">
                        <div class="icon"><i class="fas fa-tags"></i></div>
                        <h4 class="title"><a>تخفیف های باور نکردنی</a></h4>
                        <p class="description" style="direction: rtl;font-size: 17px">پاکیدو علاوه بر قیمت ارزان و مقرون به صرفه تخفیف های باور نکردنی دارد.</p>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-up" data-aos-delay="400">
                    <div class="box">
                        <div class="icon"><i class="fas fa-magic"></i></div>
                        <h4 class="title"><a>تمام اتوماتیک</a></h4>
                        <p class="description" style="direction: rtl;font-size: 17px">بهترین و با کیفیت ترین خدمات ما به صورت اوتوماتیک انجام می شود از محل مشتری گرفته شده و خدمات روی آن انجام می شود و در محل به مشتری تحویل داده خواهد شد.</p>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Services Section -->
</main><!-- End #main -->
<section id="prices" class="container" style="padding-top: 5px">
    <div class="container" data-aos="fade-up">
        <div class="card-header" style="background-color: transparent;border: 3px dashed orange;border-radius: 25px;padding:5px;">
            <h2 style="margin: 0px;font-weight: bold;padding: 8px">لیست قیمت ها</h2>
        </div>
        <div class="row card-body" data-aos="fade-up" data-aos-delay="200" style="text-align: center">
            @foreach($product as $pro)
                @php
                $id = $pro['id'];
                    $icon = $pro['icon'];
                    $title = $pro['title'];
                    $nonint = $pro['nonint'];
                    $price = $pro['price'];
                @endphp
                <div class="columns" style="border: 1px solid lightgrey;border-radius: 15px;">
                    <ul class="price">
                        <li class="header" id="hdr"><img src="{{$icon}}"></li>
                        <li id="titles">{{$title}}</li>
                        <li class="grey" id="gry"><p style="margin: 0px"><p id="pup">{{$nonint}}</p><p style="margin: 0px">{{$price}} تومان </p></li>
                        <li class="bg-white">
                            <form method="post" action="<?php echo route('saveshopp')?>">
                                <?php
                                echo csrf_field();
                                ?>
                                <input type="hidden" name="id" value="{{$id}}">
                            <button style="width: 100%;" id="btn" type="submit"><i class="fas fa-plus" style="padding: 5px;margin-right: 3px;font-size: 12px;"></i>اضافه کردن به سبد خرید</button>
                            </form>
                        </li>
                    </ul>
                </div>
            @endforeach
        </div>
        </div>
</section>
@include('footer')
@if(session('success'))
    <div class="container-fluid float-left" id="snackbar1"><strong>{{ session('success') }}</strong></div>
@endif
<!-- Vendor JS Files -->
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
<script>
    function openfolder() {
        var a;
        a = document.getElementById("div1");
        a.innerHTML = "<i class=\"far fa-bell\"></i>";
        setTimeout(function () {
            a.innerHTML = "<i class=\"fas fa-bell\"></i>";
        }, 1000);
    }
    openfolder();
    setInterval(openfolder, 2000);
</script>
<script>
    function openfolder() {
        var a;
        a = document.getElementById("div2");
        a.innerHTML = "<i class=\"far fa-circle\"></i>";
        setTimeout(function () {
            a.innerHTML = "<i class=\"fas fa-circle\"></i>";
        }, 200);
    }
    openfolder();
    setInterval(openfolder, 600);
</script>
</body>
</html>
