<!DOCTYPE html>
<html lang="en">

<head>
    <title>پاکیدو | داشبورد</title>
    <link rel="stylesheet" href="/vendor/feather/feather.css">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="/vendor/css/vendor.bundle.base.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="/vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="/vendor/ti-icons/css/themify-icons.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="/js/select.dataTables.min.css">
    <link rel="stylesheet" href="/css/vertical-layout-light/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
</head>
<style>
    @font-face {
        font-family: Yekan;
        src: url('../public/webfonts/Yekan.eot');
        src: url('../public/webfonts/Yekan.eot?#iefix') format('../public/webfonts/Yekan-opentype'),
        url('../webfonts/Yekan.woff') format('woff'),
        url('../public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
    }
    @font-face {
        font-family: BNazanin;
        src: url('/public/webfonts/BNazanin.eot');
        src: url('/public/webfonts/BNazanin.eot?#iefix') format('/public/webfonts/BNazanin-opentype'),
        url('/webfonts/BNazanin.woff') format('woff'),
        url('/public/webfonts/BNazanin.ttf') format('truetype');
        font-style: normal;
    }
    *{
        font-family: Yekan;
        font-weight: bold;
    }
</style>
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
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
        <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo mr-5" href="{{route('index')}}"><span class="mr-2"><img src="{{asset('Untitled-4.png')}}"></span></a>
            <a class="navbar-brand brand-logo-mini" href="{{route('index')}}"><span class="mr-2"><img src="{{asset('log.png')}}"></span></a>
        </div>
        <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
            <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                <span class="icon-menu"></span>
            </button>
            <ul class="navbar-nav navbar-nav-right">
                <li class="nav-item dropdown">
                    <a class="nav-link count-indicator dropdown-toggle" id="notificationDropdown" href="#" data-toggle="dropdown">
                        <i class="icon-bell mx-0"></i>
                        <span class="count"></span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown preview-list" aria-labelledby="notificationDropdown">
                        <p class="mb-0 font-weight-normal dropdown-header" style="font-weight: bold;text-align: center">نوتیفیکیشن</p>
                        @if(empty($authentic))
                            <a class="dropdown-item preview-item">
                                <div class="preview-thumbnail">
                                    <div class="preview-icon bg-info">
                                        <i class="ti-agenda mx-0"></i>
                                    </div>
                                </div>
                                <div class="preview-item-content">
                                    <h6 class="preview-subject font-weight-normal">کاربر گرامی نسبت به احراز هویت خود اقدام کنید</h6>
                                </div>
                            </a>
                        @endif
                        @if(!empty($authentic))
                            @foreach($authentic as $auth)
                                @php
                                    $status = $auth['status'];
$time = $auth['time'];
                                @endphp
                            @endforeach
                            @if($status == 'taiid')
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon bg-success">
                                            <i class="ti-agenda mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">هویت شما تایید شد</h6>
                                    </div>
                                </a>
                            @endif
                            @if($status == 'read')
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon" style="background-color: red">
                                            <i class="ti-agenda mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">هویت شما تایید نشده است</h6>
                                    </div>
                                </a>
                            @endif
                            @if($status == 'unread')
                                <a class="dropdown-item preview-item">
                                    <div class="preview-thumbnail">
                                        <div class="preview-icon" style="background-color: grey">
                                            <i class="ti-agenda mx-0"></i>
                                        </div>
                                    </div>
                                    <div class="preview-item-content">
                                        <h6 class="preview-subject font-weight-normal">هویت شما درانتظار تایید است</h6>
                                    </div>
                                </a>
                            @endif
                        @else

                        @endif
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">کاربر گرامی به پاکیدو خوش آمدید</h6>
                                <p class="font-weight-light small-text mb-0 text-muted" style="direction: rtl;font-family: Yekan">
                                    {{$datee}}
                                </p>
                            </div>
                        </a>
                    </div>
                </li>
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item dropdown">
                        {{auth()->user()->name}}
                    </li>
                </ul>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
                <span class="icon-menu"></span>
            </button>
        </div>
    </nav>
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div id="right-sidebar" class="settings-panel">
            <i class="settings-close ti-close"></i>
            <ul class="nav nav-tabs border-top" id="setting-panel" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="todo-tab" data-toggle="tab" href="#todo-section" role="tab" aria-controls="todo-section" aria-expanded="true">TO DO LIST</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="chats-tab" data-toggle="tab" href="#chats-section" role="tab" aria-controls="chats-section">CHATS</a>
                </li>
            </ul>
            <div class="tab-content" id="setting-content">
                <div class="tab-pane fade show active scroll-wrapper" id="todo-section" role="tabpanel" aria-labelledby="todo-section">
                    <div class="add-items d-flex px-3 mb-0">
                        <form class="form w-100">
                            <div class="form-group d-flex">
                                <input type="text" class="form-control todo-list-input" placeholder="Add To-do">
                                <button type="submit" class="add btn btn-primary todo-list-add-btn" id="add-task">Add</button>
                            </div>
                        </form>
                    </div>
                    <div class="list-wrapper px-3">
                        <ul class="d-flex flex-column-reverse todo-list">
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Team review meeting at 3.00 PM
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Prepare for presentation
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox">
                                        Resolve all the low priority tickets due today
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Schedule meeting for next week
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                            <li class="completed">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="checkbox" type="checkbox" checked>
                                        Project review
                                    </label>
                                </div>
                                <i class="remove ti-close"></i>
                            </li>
                        </ul>
                    </div>
                    <h4 class="px-3 text-muted mt-5 font-weight-light mb-0">Events</h4>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 11 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Creating component page build a js</p>
                        <p class="text-gray mb-0">The total number of sessions</p>
                    </div>
                    <div class="events pt-4 px-3">
                        <div class="wrapper d-flex mb-2">
                            <i class="ti-control-record text-primary mr-2"></i>
                            <span>Feb 7 2018</span>
                        </div>
                        <p class="mb-0 font-weight-thin text-gray">Meeting with Alisa</p>
                        <p class="text-gray mb-0 ">Call Sarah Graves</p>
                    </div>
                </div>
                <!-- To do section tab ends -->
                <div class="tab-pane fade" id="chats-section" role="tabpanel" aria-labelledby="chats-section">
                    <div class="d-flex align-items-center justify-content-between border-bottom">
                        <p class="settings-heading border-top-0 mb-3 pl-3 pt-0 border-bottom-0 pb-0">Friends</p>
                        <small class="settings-heading border-top-0 mb-3 pt-0 border-bottom-0 pb-0 pr-3 font-weight-normal">See All</small>
                    </div>
                    <ul class="chat-list">
                        <li class="list active">
                            <div class="profile"><img src="images/faces/face1.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Thomas Douglas</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">19 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face2.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <div class="wrapper d-flex">
                                    <p>Catherine</p>
                                </div>
                                <p>Away</p>
                            </div>
                            <div class="badge badge-success badge-pill my-auto mx-2">4</div>
                            <small class="text-muted my-auto">23 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face3.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Daniel Russell</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">14 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face4.jpg" alt="image"><span class="offline"></span></div>
                            <div class="info">
                                <p>James Richardson</p>
                                <p>Away</p>
                            </div>
                            <small class="text-muted my-auto">2 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face5.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Madeline Kennedy</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">5 min</small>
                        </li>
                        <li class="list">
                            <div class="profile"><img src="images/faces/face6.jpg" alt="image"><span class="online"></span></div>
                            <div class="info">
                                <p>Sarah Graves</p>
                                <p>Available</p>
                            </div>
                            <small class="text-muted my-auto">47 min</small>
                        </li>
                    </ul>
                </div>
                <!-- chat tab ends -->
            </div>
        </div>
        <!-- partial -->
        <!-- partial:partials/_sidebar.html -->
        <nav class="sidebar sidebar-offcanvas" id="sidebar">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="{{route('index')}}">
                        <i class="icon-location menu-icon"></i>
                        <span class="menu-title">خانه</span>
                    </a>
                </li>
                <li class="nav-item cursor-pointer" style="cursor: pointer">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <i class="icon-power menu-icon" style="font-weight:bold;cursor: pointer"></i>
                        <span :href="route('logout')"
                              onclick="event.preventDefault();
                                        this.closest('form').submit();" class="menu-title" style="font-family: Yekan;cursor: pointer">
                                خروج از حساب کاربری
                            </span>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('tickett')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">تیکت پشتیبانی</span>
                    </a>
                    {{--<div class="collapse" id="ui-basic">
                        <ul class="nav flex-column sub-menu">
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                            <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
                        </ul>
                    </div>--}}
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="{{route('authentic')}}">
                        <i class="icon-file menu-icon"></i>
                        <span class="menu-title">احراز هویت</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('dashboard')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">داشبورد</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
            @if(!empty($authentic))

                @foreach($authentic as $auth)
                    @php
$status = $auth['status'];
                    @endphp
                @endforeach
                    @if($status == 'taiid')
                        <div class="alert alert-danger" role="alert" style="border-radius: 0px;margin-bottom: 0px;background-color: green;color: white;font-weight:bold;font-size: 15px;direction: rtl;text-align: center;border: 0px">
                           کاربر گرامی اطلاعات شما تایید شد
                        </div>
                    @endif
                    @if($status == 'read')
                        <div class="alert alert-danger" role="alert" style="border-radius: 0px;margin-bottom: 0px;background-color: red;color: white;font-weight:bold;font-size: 15px;direction: rtl;text-align: center;border: 0px">
                           کاربر گرامی اطلاعات شما تایید نشد لطفا با تیکت پشتیبانی تماس بگیرید
                        </div>
                    @endif
                    @if($status == 'unread')
                        <div class="alert alert-danger" role="alert" style="border-radius: 0px;margin-bottom: 0px;background-color: cornflowerblue;color: white;font-weight:bold;font-size: 15px;direction: rtl;text-align: center;border: 0px">
                            کاربر گرامی منتظر تایید اطلاعات خود باشید
                        </div>
                    @endif
            @else
            <div class="alert alert-warning" role="alert" style="border-radius: 0px;margin-bottom: 0px;background-color: #ff6466;color: white;font-weight:bold;font-size: 15px;direction: rtl;text-align: center">
                کاربر گرامی لطفا نسبت به احراز هویت خود اقدام کنید در غیر این صورت طی 72 ساعت آینده حساب شما مسدود خواهد شد
            </div>
                @endif
            <div class="content-wrapper">
                <div class="row">
                    <div class="col-md-12 grid-margin">
                        <div class="row">
                            <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            </div>
                            <div class="col-12 col-xl-4">
                                <div class="justify-content-end d-flex">
                                    <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                                        <button class="btn btn-sm btn-light bg-white float-right" aria-haspopup="true" aria-expanded="true" style="font-family: 'BNazanin';font-weight: bold;font-size: 17px">
                                            {{$date}}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 grid-margin stretch-card">
                        <div class="card tale-bg" style="border-radius: 0px">

                    </div>
                </div>
                </div>
                @if(count($errors))

                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.
                        <br/>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row text-center">
                    @if(!empty($authentic))

                        @foreach($authentic as $auth)
                            @php
                            $name = $auth['name'];
$phonenumber = $auth['phone'];
$homenumber = $auth['homenumber'];
$postalcode = $auth['postalcode'];
$address = $auth['address'];
$status = $auth['status'];
$numm = \Illuminate\Support\Facades\Auth::user()->phone;
                            @endphp
                            @endforeach
                    <form class="col-md-12" method="post" action="<?php echo route('authenticsave')?>">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputname4" placeholder="نام و نام خانوادگی" style="text-align: center;font-size: 15px;font-weight: bold" name="name" required value="{{$name}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputEmail4" placeholder="شماره منزل" style="text-align: center;font-size: 15px;font-weight: bold" name="homephone" required value="{{$homenumber}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputCity" value="{{$numm}}" name="hamrah" placeholder="شماره همراه" style="text-align: center;font-size: 15px;font-weight: bold" required disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputname4" placeholder="کد پستی" style="text-align: center;font-size: 15px;font-weight: bold" name="postalcode" required value="{{$postalcode}}" disabled>
                            </div>
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" id="inputCity" name="manzel" placeholder="آدرس دقیق منزل" style="text-align: center;font-size: 15px;font-weight: bold" required value="{{$address}}" disabled>
                            </div>
                        </div>
                        <input type="hidden" name="userid" value="{{$userid}}">
                        @if($status == 'taiid')
                            <p class="btn" style="border-radius: 0px;margin-bottom: 10px;background-color: green;color: white;font-size: 15px;padding: 10px 100px;cursor: not-allowed;" type="submit" >اطلاعات هویت شما تایید شد</p>

                        @endif
                        @if($status == 'read')
                            <a class="btn" href="{{route('tickett')}}" style="border-radius: 0px;margin-bottom: 10px;background-color: red;color: white;font-size: 15px;padding: 10px 100px;cursor: pointer;" type="submit" >اطلاعات هویت شما تایید نشد</a>

                        @endif
                        @if($status == 'unread')
                        <p class="btn" style="border-radius: 0px;margin-bottom: 10px;background-color: grey;color: black;font-size: 15px;padding: 10px 100px;cursor: wait;" type="submit" >...در انتظار تایید</p>
                            @endif
                    </form>
                        @else
                        <form class="col-md-12" method="post" action="<?php echo route('authenticsave')?>">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputname4" placeholder="نام و نام خانوادگی" style="text-align: center;font-size: 15px;font-weight: bold" name="name" required value="{{$username}}" min="6">
                                </div>
                                <div class="form-group col-sm-4">
                                    <input type="text" class="form-control" id="inputEmail4" placeholder="شماره منزل" style="text-align: center;font-size: 15px;font-weight: bold" name="homephone" required>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputCity" name="hamrah" value="{{\Illuminate\Support\Facades\Auth::user()->phone}}" placeholder="شماره همراه" style="text-align: center;font-size: 15px;font-weight: bold" required disabled>
                                </div>
                                <div class="form-group col-md-4">
                                    <input type="text" class="form-control" id="inputname4" placeholder="کد پستی" style="text-align: center;font-size: 15px;font-weight: bold" name="postalcode" required>
                                </div>
                                    <div class="form-group col-md-4">
                                        <input type="text" class="form-control" id="inputCity" name="manzel" placeholder="آدرس دقیق منزل" style="text-align: center;font-size: 15px;font-weight: bold" required>
                                    </div>
                            </div>
                            <input type="hidden" name="userid" value="{{$userid}}">
                            <button type="submit" class="btn" style="border-radius: 0px;margin-bottom: 10px;background-color: green;color: white;font-size: 15px;padding: 10px 100px">ثبت</button>
                        </form>
                    @endif
</div>
                <br><br><br>
<footer class="footer" style="direction: rtl;text-align: right">
    <div class="copyright">
        <strong> تمامی حقوق مادی و معنوی محتوای وبسایت برای مجموعه <span><a href="#">پاکیدو</a>&copy;</span> محفوظ است. </strong>
    </div>
</footer>
                @if(session('success'))
                    <div class="container-fluid float-left" id="snackbar1"><strong>{{ session('success') }}</strong></div>
@endif

</body>
<script src="/vendor/js/vendor.bundle.base.js"></script>
<script src="/vendor/datatables.net/jquery.dataTables.js"></script>
<script src="/vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="/js/dataTables.select.min.js"></script>
<script src="/js/off-canvas.js"></script>
<script src="/js/hoverable-collapse.js"></script>
<script src="/js/template.js"></script>
<script src="/js/dashboard.js"></script>
</body>
<script>
    var x = document.getElementById("snackbar1");
    x.className = "show";
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
</script>
</html>
