<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <script src="https://kit.fontawesome.com/9067ae8a47.js" crossorigin="anonymous"></script>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>factor</title>
</head>
<body>
<div class="container-fluid" style="direction: rtl;text-align: right">
    تاریخ امروز :{{$date}}
</div>
<div class="container">
    <br>
    @foreach($alls as $arr)
        <table class="table" style="border: 1px solid black">
            <thead>
            <tr style="text-align: center">
                <th>امضا</th>
                <th scope="col">شماره سفارش</th>
                <th scope="col">زمان</th>
                <th scope="col">آدرس</th>
                <th scope="col">شماره همراه</th>
                <th>شماره تلفن</th>
                <th scope="col">نام و نام خانوادگی</th>
                <th scope="col">Id</th>
            </tr>
            </thead>
            <tbody>
            @php
                $count = $arr['count'];
    $time = $arr['time'];
    $userid = $arr['userid'];
    $orderid = $arr['orderid'];
    $prod = $arr['pro'];
    $auth = $arr['auth'];
            @endphp
            @foreach ($auth as $item)
                @php
                    $name = $item['name'];
        $phone = $item['phone'];
        $homephone = $item['homenumber'];
        $address = $item['address'];
                @endphp
            @endforeach
            @foreach ($prod as $prr)
                @php
                    $icon = $prr['icon'];
        $title = $prr['title'];
                @endphp
            @endforeach
            <tr style="text-align: center">
                <td></td>
                <th scope="row">{{$orderid}}</th>
                <td>{{$time}}</td>
                <td>{{$address}}</td>
                <td>{{$phone}}</td>
                <td>{{$homephone}}</td>
                <td>{{$name}}</td>
                <td>{{$userid}}</td>
            </tr>
            <tr>

                <table class="table">
                    <thead>
                    <p style="text-align: right;direction: rtl;font-weight: bold">سفارشات:</p>
                    </thead>
                    <tbody>
                    <tr style="direction: rtl;text-align: center">
                        <td>{{$count}}</td>
                        <td>{{$title}}</td>
                        <th scope="row"><div><img src="{{$icon}}"></div></th>
                    </tr>
                    </tbody>
                </table>
            </tr>
            @endforeach
            </tbody>
        </table>
</div>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
