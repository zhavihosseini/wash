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
            <form method="post" action="<?php echo route('saveupdatesheader',['hash'=>$enc])?>">
                @csrf
                <label for="text">text :</label>
                <input type="text" name="text" id="text" placeholder="text" value="{{$text}}">
                <br><br>
                <label for="link">link :</label>
                <input type="text" name="link" id="link" placeholder="link" value="{{$link}}">
                <br><br>
                <input type="submit" name="submit" value="submit">
            </form>
            @endforeach
        </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

</body>
</html>
