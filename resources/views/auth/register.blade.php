<title>پاکیدو | ثبت نام</title>
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
<style>
    @font-face {
        font-family: Yekan;
        src: url('./public/webfonts/Yekan.eot');
        src: url('./public/webfonts/Yekan.eot?#iefix') format('./public/webfonts/Yekan-opentype'),
        url('./webfonts/Yekan.woff') format('woff'),
        url('./public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
    }
    #name:focus{
          border: 1px solid lightblue;
          box-shadow: none;
          outline: none;

      }
    #username:focus{
        border: 1px solid lightblue;
        box-shadow: none;
        outline: none;
        border-radius: 0px;
    }
    #email:focus{
        border: 1px solid lightblue;
        box-shadow: none;
        outline: none;
        border-radius: 0px;
    }
    #password{
        border: 1px solid lightblue;
        box-shadow: none;
        outline: none;
        border-radius: 0px;
    }
    #password_confirmation{
        border: 1px solid lightblue;
        box-shadow: none;
        outline: none;
        border-radius: 0px;
    }
    #subb:focus{
        box-shadow: none;
        border: none;
        outline: none;
        border-radius: 0px;
    }
    .register-button {
        display: block;
        width: 100%;
        height: 42px;
        margin-top: 25px;
        font-size: 16px;
        font-weight: bold;
        color: #494d59;
        text-align: center;
        text-shadow: 0 1px rgba(255, 255, 255, 0.5);
        background: #fcfcfc;
        border: 1px solid;
        border-color: #d8d8d8 #d1d1d1 #c3c3c3;
        border-radius: 2px;
        cursor: pointer;
        background-image: -webkit-linear-gradient(top, #fefefe, #eeeeee);
        background-image: -moz-linear-gradient(top, #fefefe, #eeeeee);
        background-image: -o-linear-gradient(top, #fefefe, #eeeeee);
        background-image: linear-gradient(to bottom, #fefefe, #eeeeee);
        -webkit-box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
        box-shadow: inset 0 -1px rgba(0, 0, 0, 0.03), 0 1px rgba(0, 0, 0, 0.04);
    }
    .register-button:active {
        background: #eee;
        border-color: #c3c3c3 #d1d1d1 #d8d8d8;
        background-image: -webkit-linear-gradient(top, #eeeeee, #fcfcfc);
        background-image: -moz-linear-gradient(top, #eeeeee, #fcfcfc);
        background-image: -o-linear-gradient(top, #eeeeee, #fcfcfc);
        background-image: linear-gradient(to bottom, #eeeeee, #fcfcfc);
        -webkit-box-shadow: inset 0 1px rgba(0, 0, 0, 0.03);
        box-shadow: inset 0 1px rgba(0, 0, 0, 0.03);
    }
    .register-button:focus {
        outline: 0;
    }

</style>
<x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <div id="logo">
                <a href="<?php echo route('index')?>"><img src="{{asset('Untitled-4.png')}}" height="60px"></a>
            </div>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-input id="name" style="font-weight: bold;font-family: Yekan;text-align: center;border-radius: 0px" class="block mt-1 w-full" type="text" name="name" :value="old('name')" placeholder="نام و نام خانوادگی" required autofocus />
            </div>
            <!-- Email Address -->
            <div class="mt-4">
                <x-input id="phone" style="font-weight: bold;font-family: Yekan;text-align: center;border-radius: 0px" placeholder="شماره همراه" class="block mt-1 w-full" type="text" name="phone" :value="old('phone')" required />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                         placeholder="رمز عبور"
                                name="password"
                                required autocomplete="new-password"
                         style="font-weight: bold;font-family: Yekan;text-align: center"/>
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required
                         style="font-weight: bold;font-family: Yekan;text-align: center"
                placeholder="تایید رمز عبور"/>
            </div>

            <div class="flex items-center justify-end mt-4" style="font-weight: bold;font-family: Yekan">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('ثبت نام کرده ایید؟') }}
                </a>
            </div>
                <br>
                <div class="col-md-12" style="text-align: center;">
                    <div class="form-group{{$errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                        <div class="col-md-6 pull-center" style="display: inline-block;">
                            {!! app('captcha')->display() !!}
                        </div>
                    </div>
                </div>
                {!! NoCaptcha::renderJs() !!}
                <br>
                <button id="subb" class="ml-4 register-button" style="font-weight: bold;font-family: Yekan;width: 100%;border: 1px solid lightgray;padding: 7px;margin-left: 0px;margin-top: 5px">
                    ثبت نام
                </button>
        </form>
    </x-auth-card>
</x-guest-layout>
{{--
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]> <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]> <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html lang="en"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Registration Form</title>
    <link rel="stylesheet" href="css/style.css">
    <!--[if lt IE 9]><script src="//html5shim.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
</head>
<body>
<h1 class="register-title">Welcome</h1>
<form class="register">
    <div class="register-switch">
        <input type="radio" name="sex" value="F" id="sex_f" class="register-switch-input" checked>
        <label for="sex_f" class="register-switch-label">Female</label>
        <input type="radio" name="sex" value="M" id="sex_m" class="register-switch-input">
        <label for="sex_m" class="register-switch-label">Male</label>
    </div>
    <input type="email" class="register-input" placeholder="Email address">
    <input type="password" class="register-input" placeholder="Password">
    <input type="submit" value="Create Account" class="register-button">
</form>
</body>
</html>
--}}
