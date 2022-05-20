<html>
<head>
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<h1 style="font-size: 50px;width: 100%;text-align: center">
 PAAKIDO
</h1>
<br/>
<h2 style="text-align: center;direction: rtl"> سلام {{$name}}</h2>
<br/>
<p style="text-align: center;padding: 10px;font-weight: bold;">پاسخ تیکت شما ارسال شد میتوانید در پروفایل کاربری خود مشاهده کنید</p>
<br>
<p style="text-align: center;padding: 10px;font-weight: bold;">کد تیکت : {{$code}}</p>
<div class="container">
    <div class="row">
        <div class="col text-center">
            <a href="<?php echo route('dashboard')?>" style="text-align: center;width: 100%">
                ورود به داشبورد
            </a>
        </div>
    </div>
</div>
<br/>
</body>
</html>
