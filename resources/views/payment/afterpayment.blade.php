<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>پاک وش | پرداخت موفق</title>
</head>
<body style="background-color: #dfe1dc">
<style>
    @font-face {
        font-family: Yekan;
        src: url('/../public/webfonts/Yekan.eot');
        src: url('/../public/webfonts/Yekan.eot?#iefix') format('/../public/webfonts/Yekan-opentype'),
        url('/../webfonts/Yekan.woff') format('woff'),
        url('/../public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
    }
    @font-face {
        font-family: BNazanin;
        src: url('/public/webfonts/BNazanin.eot');
        src: url('/public/webfonts/BNazanin.eot?#iefix') format('/public/webfonts/BNazanin-opentype'),
        url('./webfonts/BNazanin.woff') format('woff'),
        url('/public/webfonts/BNazanin.ttf') format('truetype');
        font-style: normal;
    }
</style>

<div class="container">
    <div class="row justify-content-center">
        <script>
            var timeleft = 20;
            var downloadTimer = setInterval(function(){
                if(timeleft <= 0){
                    document.getElementById("countdown").innerHTML = "در حال بازگشت به سایت پذیرنده";
                    clearInterval(downloadTimer);
                }
                else{
                    document.getElementById("countdown").innerHTML = timeleft + " ثانیه";
                }
                document.getElementById("progressBar").value = 10 - timeleft;
                timeleft -= 1;
            }, 1000);

            setTimeout(function(){
                window.location.href = 'https://paakwash.ir/dashboard';
            }, 10000);
        </script>
        <progress value="0" max="10" id="progressBar" style="background-color: green;padding: 0px"></progress>
        <div class="col-12" style="margin-top: 15px;border: 1px solid grey;background-color: white">
            <div id="message" style="text-align: center;color: black;font-weight: bold;direction: rtl;font-family: Yekan"><div id="countdown" style="font-family: BNazanin"></div></div>
            <p style="direction: rtl;text-align: center;color: green;font-weight: bold;font-size: 20px;font-family: Yekan">پرداخت انجام شد</p>
            <div class="row">
                <p style="direction: rtl;text-align: right;color: green;font-weight: bold;font-size: 20px;font-family: Yekan"> شناسه پرداخت :  {{$tr}}</p>
                <p style="direction: rtl;text-align: right;color: green;font-weight: bold;font-size: 20px;font-family: Yekan"> کد تایید : {{$status}}</p>
                <p style="direction: rtl;text-align: right;color: green;font-weight: bold;font-size: 20px;font-family: Yekan;text-decoration: underline #e10021">کد پیگیری سفارش : {{$orderid}}</p>
            </div>
            <br>
            <div class="col-md-12 text-center">
                <p style="direction: rtl;text-align: center;color: black;font-weight: bold;font-size: 20px;font-family: BNazanin">کاربر گرامی وضعیت سفارش خود را در پروفایل کاربری خود مشاهده کنید، در صورت بروز هرگونه مشکل با کارشناسان ما در تماس باشید.</p>
                <p style="direction: rtl;text-align: center;color: black;font-weight: bold;font-size: 20px;font-family: BNazanin">کاربر گرامی حتما کد پیگیری سفارش خود را یادداشت کنید.</p>
            </div>
        </div>
        </div>
        <div class="container">
            <div class="col-md-12 text-center">
                <a href="<?php echo route('dashboard')?>" type="button" class="btn btn-success" style="margin-top: 10px;border-radius: 0px;font-family: Yekan;font-weight: bold">پروفایل کاربری</a>
            </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script>

    </script>
</body>
</html>
