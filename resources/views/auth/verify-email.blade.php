<title>پاکیدو | تایید ایمیل</title>
<link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
<link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
<meta name="csrf-token" content="{{ csrf_token() }}">
<script src="https://www.google.com/recaptcha/api.js?onload=onloadCallback&render=explicit"
        async defer>
</script>
<style>
    @font-face {
        font-family: Yekan;
        src: url('./public/webfonts/Yekan.eot');
        src: url('./public/webfonts/Yekan.eot?#iefix') format('./public/webfonts/Yekan-opentype'),
        url('./webfonts/Yekan.woff') format('woff'),
        url('./public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
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

        <div class="mb-4 text-sm text-gray-600" style="font-family: Yekan;text-align: right;font-size: 15px">
           کاربر گرامی حساب شما ساخته شد ولی قبل از شروع حتما ایمیل خود را تایید کنید
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="mb-4 font-medium text-sm text-green-600">
               تایید ایمیل برای شما ارسال شد
            </div>
        @endif

        <div class="mt-4 flex items-center justify-between">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf

                <div>
                    <x-button style="font-family: Yekan;font-size: 15px;border-radius: 0px;background-color: white;border: 1px solid grey;color: black">
                        ارسال دوباره تایید ایمیل
                    </x-button>
                </div>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf

                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900" style="font-family: Yekan">
                    خروج از حساب کاربری
                </button>
            </form>
        </div>
    </x-auth-card>
</x-guest-layout>
