<title>پاکیدو | تایید رمز عبور</title>
<style>
    @font-face {
        font-family: Yekan;
        src: url('./public/webfonts/Yekan.eot');
        src: url('./public/webfonts/Yekan.eot?#iefix') format('./public/webfonts/Yekan-opentype'),
        url('./webfonts/Yekan.woff') format('woff'),
        url('./public/webfonts/Yekan.ttf') format('truetype');
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
               <a href="<?php echo route('index')?>"><img src="{{asset('Untitled-4.png')}}" height="60px"></a>
        </x-slot>

        <div class="mb-4 text-sm text-gray-600" style="font-family: Yekan;text-align: right;direction: rtl">
            این یک منطقه امن از برنامه است. لطفا قبل از ادامه رمز خود را تأیید کنید.        </div>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div>
                <input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="current-password" placeholder="رمز عبور" style="text-align: center;font-family: Yekan"/>
            </div>

            <div class="flex justify-end mt-4">
                <button class="register-button" style="font-family: Yekan">
                   تایید
                </button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
