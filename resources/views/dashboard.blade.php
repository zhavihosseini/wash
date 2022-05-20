<!DOCTYPE html>
<html lang="en">

<head>
    <title>پاکیدو | داشبورد</title>
    <link rel="stylesheet" href="vendor/feather/feather.css">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('favic/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('favic/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('favic/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('favic/site.webmanifest')}}">
</head>
<style>
    @font-face {
        font-family: Yekan;
        src: url('./public/webfonts/Yekan.eot');
        src: url('./public/webfonts/Yekan.eot?#iefix') format('./public/webfonts/Yekan-opentype'),
        url('./webfonts/Yekan.woff') format('woff'),
        url('./public/webfonts/Yekan.ttf') format('truetype');
        font-style: normal;
    }
    @font-face {
        font-family: BNazanin;
        src: url('public/webfonts/BNazanin.eot');
        src: url('public/webfonts/BNazanin.eot?#iefix') format('public/webfonts/BNazanin-opentype'),
        url('/webfonts/BNazanin.woff') format('woff'),
        url('public/webfonts/BNazanin.ttf') format('truetype');
        font-style: normal;
    }
    *{
        font-family: Yekan;
        font-weight: bold;
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
                    <a class="nav-link" href="{{route('authenticc')}}">
                        <i class="icon-file menu-icon"></i>
                        <span class="menu-title">احراز هویت</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('myshoppingcart')}}">
                        <i class="icon-tag menu-icon"></i>
                        <span class="menu-title"><span style="font-family: BNazanin;color: red;font-weight: bold;font-size: 17px">{{$shop}}</span>سبد خرید</span>
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
                            <div class="card-people mt-auto">
                                <img src="images/dashboard/people.svg" alt="people">
                                <div class="weather-info">
                                    <div class="d-flex">
                                خوش آمدید
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 grid-margin transparent" style="margin-bottom: 0px">
                        <div class="row">
                            <div class="col-md-6 mb-4 stretch-card transparent" style="margin-bottom: 0px">
                                <div class="card card-tale" style="border-radius: 0px">
                                    <div class="card-body">
                                        <p class="mb-4" style="font-size: 20px;text-align: right">سفارشات</p>
                                        <p class="fs-30 mb-2"style="font-family: BNazanin">{{$allaftercount}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent" style="margin-bottom: 0px">
                                <div class="card card-tale" style="border-radius: 0px">
                                    <div class="card-body">
                                        <p class="mb-4" style="font-size: 20px;text-align: right">سبد خرید</p>
                                        <p class="fs-30 mb-2" style="font-family: BNazanin">
                                            {{$shop}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent" style="margin-bottom: 0px">
                                <div class="card card-tale" style="border-radius: 0px">
                                    <div class="card-body">
                                        <p class="mb-4" style="font-size: 20px;text-align: right">پاسخ ها</p>
                                        <p class="fs-30 mb-2" style="font-family: BNazanin">{{$rep}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent" style="margin-bottom: 0px">
                                <div class="card card-tale" style="border-radius: 0px">
                                    <div class="card-body">
                                        <p class="mb-4" style="font-size: 20px;text-align: right">تیکت ارسال شده</p>
                                        <p class="fs-30 mb-2" style="font-family: BNazanin">{{$give}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p style="text-align: right;padding:10px 0px;direction: rtl;line-height:20px">
                            کاربر گرامی از این که سرویس ما را انتخاب کرده ایید از شما متشکریم
                        </p>
                        <p style="text-align: right;padding:10px 0px;direction: rtl;line-height:25px">
                            در صورت بروز هرگونه مشکل حتما با پشتیبانی وب سایت از طریق منو با تیکت پشتیبانی در ارتباط باشید.
                        </p>
                        <p style="text-align: right;padding:10px 0px;direction: rtl;line-height:25px">
                            سفارشات هر روز از ساعت 7 صبح تا 14 ظهر جمع آوری خواهد شد در صورت ثبت سفارش خارج از ساعت کاری سفارشات شما برای روز کاری آینده موکول خواهد شد.
                        </p>
                        <p style="text-align: right;padding:10px 0px;direction: rtl;line-height:25px">
                            سفارشات در روز های تعطیل  (تعطیلات رسمی و جمعه ها)  ثبت خواهد شد و اولین روز کاری از شما دریافت خواهیم کرد.
                        </p>
                    </div>
                    <div class="col-md-12 grid-margin stretch-card">
                                <div class="card">
                                    <div class="card-header" style="text-align: center;background-color: white">
                                        سفارشات شما
                                    </div>
                                    <div class="card-body" style="text-align: center;overflow-x: scroll;max-height: 350px">
                                        @if(empty($allpr))
                                            <p style="color: grey">شما هنوز سفارشی را ثبت نکرده ایید</p>
                                        @else
                                    <table class="table table-bordered">
                                        <thead style="overflow-x: scroll;max-width: 200px">
                                        <tr>
                                            <th scope="col">کد سفارش</th>
                                            <th scope="col">زمان سفارش</th>
                                            <th scope="col">وضعیت</th>
                                            <th scope="col">تعداد</th>
                                            <th scope="col">نام محصول</th>
                                            <th scope="col">آیکن</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($allpr as $itemm)
                                            @php
                                            $count = $itemm['count'];
$status = $itemm['status'];
                                            $icon = $itemm['pr'][0]['icon'];
                                            $title = $itemm['pr'][0]['title'];
                                            $time = $itemm['time'];
                                            $orderid = $itemm['orderid'];
                                            @endphp
                                        <tr>
                                            <td>{{$orderid}}</td>
                                            <th>{{$time}}</th>
                                            <th scope="row">
                                                @if($status == 1)
                                                    <p style="color: grey;direction: rtl;font-weight: bold">در حال انتطار...</p>
                                                    @elseif($status == 2)
                                                    <p style="color: yellowgreen;direction: rtl;font-weight: bold">در حال دریافت</p>
                                                @elseif($status == 3)
                                                    <p style="color: orange;direction: rtl;font-weight: bold">در حال تحویل</p>
                                                @elseif($status == 4)
                                                    <p style="color: green;direction: rtl;font-weight: bold">تکمیل</p>
                                                @endif
                                            </th>
                                            <td style="font-family: BNazanin;font-size: 17px;font-weight:bottom: ;">{{$count}}</td>
                                            <td>{{$title}}</td>
                                            <td><div><img src="{{$icon}}"></div></td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    </div>
        </div>
    </div>
</div>
            </div>
        </div>
    </div>
</div>
            <footer class="footer" style="direction: rtl;text-align: right">
                <div class="copyright">
                    <strong> تمامی حقوق مادی و معنوی محتوای وبسایت برای مجموعه <span><a href="#">پاکیدو </a>&copy;</span> محفوظ است. </strong>
                </div>
            </footer>
</body>
<script src="vendor/js/vendor.bundle.base.js"></script>
<script src="vendor/datatables.net/jquery.dataTables.js"></script>
<script src="vendor/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="js/dataTables.select.min.js"></script>
<script src="js/off-canvas.js"></script>
<script src="js/hoverable-collapse.js"></script>
<script src="js/template.js"></script>
<script src="js/dashboard.js"></script>
</body>
</html>

