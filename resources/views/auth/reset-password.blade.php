<title>پاکیدو | ورود</title>
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
        src: url('../public/webfonts/Yekan.eot');
        src: url('../public/webfonts/Yekan.eot?#iefix') format('../public/webfonts/Yekan-opentype'),
        url('../webfonts/Yekan.woff') format('woff'),
        url('../public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
    }
    input:focus{
        box-shadow: none;
        border: none;
        outline: none;
    }
    #bttn:focus{
        border: 0px;
        background-color: lightblue;
        color: white;
        outline: none;
        box-shadow: none;
    }
    #username:focus{
        border: 1px solid lightblue;
        outline: none;
        box-shadow: none;
    }
    #password:focus{
        border: 1px solid lightblue;
        outline: none;
        box-shadow: none;
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

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <!-- Password Reset Token -->
            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <!-- Email Address -->
            <div>
                <x-input id="email" class="block mt-1 w-full" type="email" placeholder="ایمیل شما" name="email" :value="old('email', $request->email)" required autofocus  style="text-align: center;font-weight: bold;font-family: Yekan;border-radius: 0px"/>
            </div>

            <!-- Password -->
            <div class="mt-4">
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required placeholder="رمز عبور جدید" style="text-align: center;font-weight: bold;font-family: Yekan;border-radius: 0px" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required  placeholder=" تکرار رمز عبور جدید" style="text-align: center;font-weight: bold;font-family: Yekan;border-radius: 0px"/>
            </div>

            <div class="flex items-center justify-end mt-4">
                <button id="bttn" class="col-md-12 text-center register-button" style="font-family: Yekan;border-radius: 0px;border: 1px solid lightgrey;background-color: white;color: black;width: 100%;margin-left: 0px;margin-top: 5px;text-align: center;font-size: 15px;padding: 7px">
                   تایید
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
