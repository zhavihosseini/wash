<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>نمایش سفارش</title>
</head>
<body>
<style>
    @font-face {
        font-family: Yekan;
        src: url({{asset('public/webfonts/Yekan.eot')}});
        src: url({{asset('public/webfonts/Yekan.eot?#iefix')}}) format({{asset('public/webfonts/Yekan-opentype')}}),
        url({{asset('public/webfonts/Yekan.woff')}}) format('woff'),
        url({{asset('public/webfonts/Yekan.ttf')}}) format('truetype');
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
</style>
<div class="container-fluid" style="background-color: grey;color: white">
    order show
</div>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card-header" style="direction: rtl;text-align: center;font-weight: bold;font-family: Yekan">
                مشخصات سفارش دهنده
            </div>
            <div class="card-body" style="overflow-x: auto">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">userid</th>
                        <th scope="col">name</th>
                        <th scope="col">phone</th>
                        <th scope="col">homephone</th>
                        <th scope="col">postalcode</th>
                        <th scope="col">melicode</th>
                        <th scope="col">fathername</th>
                        <th scope="col">status</th>
                        <th scope="col">time</th>
                        <th scope="col">email</th>
                        <th scope="col">address</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @foreach($auth as $au)
                            @php
                            $id = $au['id'];
$userid = $au['userid'];
$name = $au['name'];
$phone = $au['phone'];
$homephone = $au['homenumber'];
$postalcode = $au['postalcode'];
$melicode = $au['melicode'];
$fathername = $au['fathername'];
$status = $au['status'];
$time = $au['time'];
$email = $au['email'];
$address = $au['address'];
                            @endphp
                        <th scope="row">{{$id}}</th>
                        <td>{{$userid}}</td>
                        <td>{{$name}}</td>
                        <td>{{$phone}}</td>
                            <td>{{$homephone}}</td>
                            <td>{{$postalcode}}</td>
                            <td>{{$melicode}}</td>
                            <td>{{$fathername}}</td>
                            <td>{{$status}}</td>
                            <td>{{$time}}</td>
                            <td>{{$email}}</td>
                            <td>{{$address}}</td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col-md-12">
            <div class="card-header"style="direction: rtl;text-align: center;font-weight: bold;font-family: Yekan">
                مشخصات سفارش
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">title</th>
                        <th scope="col">price</th>
                        <th scope="col">status</th>
                        <th>time</th>
                        <th>orderid</th>
                        <th>count</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($allpr as $alls)
                        @php
                        $id = $alls['pr'][0]['id'];
$title = $alls['pr'][0]['title'];
                        $price = $alls['pr'][0]['price'];
                        $count = $alls['count'];
                        $status = $alls['status'];
                        $time = $alls['time'];
                        $orderid = $alls['orderid'];
                        @endphp
                    <tr>
                        <th scope="row">{{$id}}</th>
                        <td>{{$title}}</td>
                        <td>{{$price}}</td>
                        <td>{{$status}}</td>
                        <td>{{$time}}</td>
                        <td>{{$orderid}}</td>
                        <td>{{$count}}</td>
                    </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
