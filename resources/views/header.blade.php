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
            <a class="nav-link scrollto " href="<?php echo route('faq')?>" title="سوالات متداول">سوالات متداول<i class="fas fa-question" style="padding-left: 5px"></i></a>
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
                        <li><a href="<?php echo route('myshoppingcart')?>" class="text-sm text-gray-700 underline nav-link scrollto" style="padding-left: 17px;padding-top: 7px"><button type="button" class="btn" style="padding: 0px;">
                                    <span class="badge" style="color: red;font-family: BNazanin;font-weight: bold;font-size: 15px">{{$shopcount}}</span> <span class="spc" style="color: #343337;font-size: 15px"> سبد خرید<i class="fas fa-shopping-cart"></i></span>
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
                <li title="اطلاعیه های مهم"><button id="modd" type="button" class="btn btn" data-toggle="modal" data-target=".bd-example-modal-lg"><div id="div1" class="fa" style="padding: 8px;color: orange;font-size: 17px"></div></button></li>

            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav>
        <div id="logo">
            <a href="{{route('index')}}"><img src="{{asset('Untitled-4.png')}}" height="60px" title="paakido"></a>
        </div>
    </div>
</header>
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="padding: 15px;direction: rtl;text-align: right;border-radius: 0px;border: none">
            <span id="div2" class="fa" style="color: orange;font-size: 17px"></span>
            <br>
            اطلاعیه های مهم :
            <hr>
            <p>کاربری گرامی به منظور ایجاد امنیت بیشتر و تسریع در فرایندهای ثبت سفارش و پرداخت حتما نسبت به احراز هویت خود اقدام کنید.</p>
            <p>
                در صورت بروز هرگونه مشکل حتما با پشتیبانی وب سایت از طریق منو با <a href="<?php echo route('tickett')?>" style="color: blue;text-decoration: underline">تیکت پشتیبانی</a> در ارتباط باشید.
            </p>
            <hr>
            <p>سفارشات : </p>
            <p style="background-color: green;color: white;padding: 10px">به منظور تسریع در فرایند ثبت سفارشات شما میتوانید از صفحه ی اینستاگرام ما هم ثبت سفارش کنید.</p>
            <p>
                سفارشات هر روز از ساعت 7 صبح تا 14 ظهر جمع آوری خواهد شد در صورت ثبت سفارش خارج از ساعت کاری سفارشات شما برای روز کاری آینده موکول خواهد شد.
            </p>
            <p>
                سفارشات در روز های تعطیل  (تعطیلات رسمی و جمعه ها)  ثبت خواهد شد و اولین روز کاری از شما دریافت خواهیم کرد.
            </p>
            <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 0px">بستن</button>
        </div>
    </div>
</div>
