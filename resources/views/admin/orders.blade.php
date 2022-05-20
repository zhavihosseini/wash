<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <title>Orders</title>
</head>
<body>
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
<div class="container-fluid" style="background-color: grey;color:white;font-weight: bold">
    orders
</div>
<div class="thetimenow-embeddable-clock" data-type="clock" data-font-color="#000000" data-border-color="#ffffff" data-background-color="#ffffff" data-font-size="18" data-location-type="country" data-location-id="33" style="border: none;text-align: center" >this</div>
<script type="text/javascript" src="http://www.thetimenow.com/ttn-embed.min.js"></script>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 15px;max-height: 600px;overflow-y: scroll">
            <div class="card-header" style="text-align: center">
                سفارشات در حال انتظار
            </div>
            <div class="card-body" style="direction: rtl;text-align: center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">درحال دریافت</th>
                        <th scope="col">نمایش</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">یوزر آیدی</th>
                        <th scope="col">آیدی</th>
                        <th>کد سفارش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($st1 == null)
                        <th>خالی</th>
                    @else
                    @foreach($st1 as $give1)
                        @php
                        $id = $give1['id'];
$userid = $give1['userid'];
$status = $give1['status'];
$orderid = $give1['orderid'];
                        @endphp
                    <tr>
                        <td>
                            <form method="post" action="<?php echo route('daryaft')?>">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="submit" value="در حال دریافت">
                            </form>
                        </td>
                        <td>
                            <form method="get" action="<?php echo route('st1show')?>">
                                @csrf
                                <input type="hidden" name="id" value="{{$id}}">
                                <input type="hidden" name="userid" value="{{$userid}}">
                                <input type="submit" value="نمایش">
                            </form>
                        </td>
                        <td>
                            @if($status == '1')
                                <p style="color: grey">در حال انتظار</p>
                                @endif
                        </td>
                        <td>{{$userid}}</td>
                        <td>{{$id}}</td>
                        <td>{{$orderid}}</td>
                    </tr>
                        @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 15px;max-height: 600px;overflow-y: scroll">
            <div class="card-header" style="text-align: center">
                سفارشات در حال دریافت
            </div>
            <div class="card-body" style="direction: rtl;text-align: center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">در حال ارسال</th>
                        <th scope="col">درحال انتظار</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">یوزر آیدی</th>
                        <th scope="col">آیدی</th>
                        <th>کد سفارش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($st2 == null)
                        <th>خالی</th>
                    @else
                    @foreach($st2 as $give1)
                        @php
                            $id = $give1['id'];
    $userid = $give1['userid'];
    $status = $give1['status'];
    $orderid = $give1['orderid'];
                        @endphp
                        <tr>
                            <th scope="row">
                                <form method="post" action="<?php echo route('sendt')?>">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="submit" value="در حال ارسال">
                                </form>
                            </th>
                            <td>
                                <form method="post" action="<?php echo route('waitf')?>">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="submit" value="در حال انتظار">
                                </form>
                            </td>
                            <td>
                                @if($status == '2')
                                    <p style="color: green">در حال دریافت</p>
                                @endif
                            </td>
                            <td>{{$userid}}</td>
                            <td>{{$id}}</td>
                            <td>{{$orderid}}</td>
                        </tr>
                    @endforeach
                    <form method="get" action="<?php echo route('factorr')?>">
                        @csrf
                    <button type="submit" class="btn btn-primary">فاکتور</button>
                    </form>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 15px;max-height: 600px;overflow-y: scroll">
            <div class="card-header" style="text-align: center">
                سفارشات در حال ارسال
            </div>
            <div class="card-body" style="direction: rtl;text-align: center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">تکمیل</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">یوزر آیدی</th>
                        <th scope="col">آیدی</th>
                        <th>کد سفارش</th>
                    </tr>
                    </thead>
                    @if($st3 == null)
                        <th>خالی</th>
                    @else
                    <tbody>
                    @foreach($st3 as $give1)
                        @php
                            $id = $give1['id'];
    $userid = $give1['userid'];
    $status = $give1['status'];
    $orderid = $give1['orderid'];
                        @endphp
                        <tr>
                            <th scope="row">
                                <form method="post" action="<?php echo route('takmill')?>">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$id}}">
                                    <input type="submit" value="تکمیل">
                                </form>
                            </th>
                            <td>
                                @if($status == '3')
                                    <p style="color: green">در حال تحویل</p>
                                @endif
                            </td>
                            <td>{{$userid}}</td>
                            <td>{{$id}}</td>
                            <td>{{$orderid}}</td>
                        </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<br><br>
<div class="container">
    <div class="row">
        <div class="col-md-12" style="margin-top: 15px;max-height: 600px;overflow-y: scroll">
            <div class="card-header" style="text-align: center">
                سفارشات تکمیل شده
            </div>
            <div class="card-body" style="direction: rtl;text-align: center">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">حذف</th>
                        <th scope="col">وضعیت</th>
                        <th scope="col">یوزر آیدی</th>
                        <th scope="col">آیدی</th>
                        <th>کد سفارش</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if($st4 == null)
                        <th>خالی</th>
                    @else
                    @foreach($st4 as $give1)
                        @php
                            $id = $give1['id'];
    $userid = $give1['userid'];
    $status = $give1['status'];
    $orderid = $give1['orderid'];
                        @endphp
                        <tr>
                            <td>
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">
                                    حذف
                                </button>
                            </td>
                            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">آیا از حذف این مورد اطمینان دارید؟</h5>
                                        </div>
                                        <div class="modal-footer">
                                              <form method="post" action="<?php echo route('hazffs')?>">
                                                  @csrf
                                 <input type="hidden" name="id" value="{{$id}}">
                                                  <button type="submit" class="btn btn-secondary">حذف</button>
                                              </form>
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">بستن</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <td>
                                @if($status == '4')
                                    <p style="color: green">تکمیل</p>
                                @endif
                            </td>
                            <td>{{$userid}}</td>
                            <td>{{$id}}</td>
                            <td>{{$orderid}}</td>
                        </tr>
                    @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</body>
</html>
