<!DOCTYPE html>
<html lang="en">

<head>
    <title>PAAKWASH ADMIN</title>
    <link rel="stylesheet" href="vendor/feather/feather.css">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendor/css/vendor.bundle.base.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></link>
    <link href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap4.min.css"></link>
    <link rel="stylesheet" href="vendor/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="vendor/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="text/css" href="js/select.dataTables.min.css">
    <link rel="stylesheet" href="css/vertical-layout-light/style.css">
    <link rel="shortcut icon" href="images/favicon.png" />
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
            <a class="navbar-brand brand-logo mr-5" href=""><span class="mr-2">PAAK WASH</span></a>
            <a class="navbar-brand brand-logo-mini" href="">P W</a>
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
                        <p class="mb-0 font-weight-normal float-left dropdown-header">Notifications</p>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-success">
                                    <i class="ti-info-alt mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Application Error</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Just now
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-warning">
                                    <i class="ti-settings mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">Settings</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    Private message
                                </p>
                            </div>
                        </a>
                        <a class="dropdown-item preview-item">
                            <div class="preview-thumbnail">
                                <div class="preview-icon bg-info">
                                    <i class="ti-user mx-0"></i>
                                </div>
                            </div>
                            <div class="preview-item-content">
                                <h6 class="preview-subject font-weight-normal">New user registration</h6>
                                <p class="font-weight-light small-text mb-0 text-muted">
                                    2 days ago
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
                    <a class="nav-link" href="">
                        <i class="icon-location menu-icon"></i>
                        <span class="menu-title">????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <form method="POST" action="{{ route('logout') }}" class="nav-link">
                        @csrf
                        <i class="icon-power menu-icon" style="font-weight:bold"></i>
                        <span :href="route('logout')"
                              onclick="event.preventDefault();
                                        this.closest('form').submit();" class="menu-title" style="font-family: Yekan;">
                                ???????? ???? ???????? ????????????
                            </span>
                    </form>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('ticket')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title"><span style="font-family: BNazanin;margin:2px;color: red;font-weight: bold">{{$ticket}}</span>???????? ????????????????</span>
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
                    <a class="nav-link" href="{{route('doc')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">?????????? ??????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('product')}}">
                        <i class="icon-inbox menu-icon"></i>
                        <span class="menu-title">??????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('allrep')}}">
                        <i class="icon-inbox menu-icon"></i>
                        <span class="menu-title">???????????? ????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('authentic')}}">
                        <i class="icon-target menu-icon"></i>
                        <span class="menu-title">?????????????? ?????????? ????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('newsletterr')}}">
                        <i class="icon-mail menu-icon"></i>
                        <span class="menu-title">??????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('sendnews')}}">
                        <i class="icon-mail menu-icon"></i>
                        <span class="menu-title">?????????? ??????????????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('headers')}}">
                        <i class="icon-target menu-icon"></i>
                        <span class="menu-title">??????</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('orders')}}">
                        <i class="icon-paper menu-icon"></i>
                        <span class="menu-title">??????????????</span>
                    </a>
                </li>
            </ul>
        </nav>
        <!-- partial -->
        <div class="main-panel">
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
                                        @php
                                            $jomlee=$jomle[0]['desc'];
                                        @endphp
                                        <p style="font-family: BNazanin;font-size: 15px">
                                            {{$jomlee}}
                                        </p>
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
                                        <p class="mb-4" style="font-size: 20px;text-align: right">?????????? ??????????????</p>
                                        <p class="fs-30 mb-2"style="font-family: BNazanin">{{$news}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 mb-4 stretch-card transparent" style="margin-bottom: 0px">
                                <div class="card card-tale" style="border-radius: 0px">
                                    <div class="card-body">
                                        <p class="mb-4" style="font-size: 20px;text-align: right">??????????????</p>
                                        <p class="fs-30 mb-2" style="font-family: BNazanin">{{$afterpa}}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-header" style="text-align: center">
                               {{$uscount}} ???????? ????
                            </div>
                            <div class="card-body" style="overflow-x: scroll;margin-right: 5px">
                                <table class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th scope="col">NAME</th>
                                        <th scope="col">USERNAME</th>
                                        <th scope="col">UTYPE</th>
                                        <th scope="col">EMAIL</th>
                                        <th scope="col">EMAIL-VERIFY</th>
                                        <th scope="col">CREATE</th>
                                        <th scope="col">UPDATE</th>
                                        <th scope="col">....</th>
                                        <th scope="col">STATUS</th>
                                        <th scope="col">BLOCKED</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($users as $us)
                                        @if(empty($us))
                                            <td>null</td>
                                        @else
                                            @php
                                                $id = $us['id'];
                                                $name = $us['name'];
                                                $username = $us['username'];
                                                $utype = $us['utype'];
                                                $email = $us['email'];
                                                $emailver = $us['email_verified_at'];
                                                $create = $us['created_at'];
                                                $update = $us['updated_at'];
                                                $block = $us['blocked_until'];
                                                $last_seen=$us['last_seen'];
                                                $h = new \Hashids\Hashids();
                                                $hash = $h->encode($id);
                                                $crypt = \Illuminate\Support\Facades\Crypt::encrypt($hash);
                                            @endphp
                                            <tr>
                                                <th scope="row">{{$id}}</th>
                                                <td>{{$name}}</td>
                                                <td>{{$username}}</td>
                                                <td>{{$utype}}</td>
                                                <td>{{$email}}</td>

                                                <td>
                                                    @if(empty($emailver))
                                                        Null
                                                    @else
                                                        {{$emailver}}
                                                    @endif
                                                </td>

                                                <td>{{$create}}</td>
                                                <td>{{$update}}</td>
                                                <td>
                                                    <form method="post" action="<?php echo route('edit',['hash'=>$crypt])?>" enctype="multipart/form-data">
                                                        <?php
                                                        echo csrf_field();
                                                        ?>
                                                        <input type="submit" value="edit">
                                                    </form>
                                                </td>
                                                <td style="vertical-align: middle">
                                                    @if(Cache::has('user-is-online-'.$id))
                                                        <p style="color: green">Online</p>
                                                    @else
                                                        {{\Carbon\Carbon::parse($last_seen)->diffForHumans()}}
                                                    @endif
                                                </td>
                                                <td>
                                                    @if(empty($block))
                                                        Null
                                                    @else
                                                        {{$block}}
                                                    @endif
                                                </td>
                                            </tr>
                                        @endif
                                    @endforeach
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
        <strong> ?????????? ???????? ???????? ?? ?????????? ???????????? ???????????? ???????? ???????????? <span><a href="#">?????? ???? </a>&copy;</span> ?????????? ??????. </strong>
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

