<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>headers</title>
</head>
<body>
<div class="container-fluid" style="background-color: grey;color: white">
    HEADERS
</div>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <form method="post" action="<?php echo route('saveheader')?>">
                @csrf
                <textarea type="text" name="text" placeholder="text"></textarea>
                <br><br>
                <input type="text" name="link" placeholder="link" required>
                <br><br>
                <input type="submit" name="submit" value="submit" required>
            </form>
        </div>
        <div class="col-md-6">
            <table class="table">
                @if(empty($all))
                    <tr>
                        <th scope="col">null</th>
                    </tr>
                    @else
                <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">text</th>
                    <th scope="col">link</th>
                    <th scope="col">time</th>
                    <th scope="col">delete</th>
                    <th scope="col">update</th>
                </tr>
                </thead>
                <tbody>
                @foreach($all as $alls)
                    @php
                        $id = $alls['id'];
    $text = $alls['text'];
    $link = $alls['link'];
    $time = $alls['desc'];
    $hashids = new \Hashids\Hashids();
    $hash = $hashids->encode($id);
    $enc = \Illuminate\Support\Facades\Crypt::encrypt($hash);
                    @endphp
                <tr>
                    <th scope="row">{{$id}}</th>
                    <td>{{$text}}</td>
                    <td>{{$link}}</td>
                    <td>{{$time}}</td>
                    <td>
                        <form method="post" action="<?php echo route('headersdelete',['hash'=>$enc])?>">
                            @csrf
                            <input type="submit" name="delete" value="delete">
                        </form>
                    </td>
                    <td>
                        <form method="get" action="<?php echo route('headersupdate',['hash'=>$enc])?>">
                            @csrf
                            <input type="submit" name="update" value="update">
                        </form>
                    </td>
                </tr>
                </tbody>
                    @endforeach
                @endif
            </table>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
