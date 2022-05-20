<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <script src="https://cdn.ckeditor.com/ckeditor5/11.0.1/classic/ckeditor.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>reply ticket</title>
</head>
<body>
<div class="container-fluid bg-light">
<h2>REPLY TO USER ID {{$userid}}</h2>
</div>
<br>
<div class="row" style="margin: 0px">
    <div class="col-md-6">
        <div class="card-header text-center">
            اطلاعات کاربر
        </div>
            @php
            $id = $user['id'];
$name = $user['name'];
$username = $user['username'];
$utype = $user['utype'];
$email = $user['email'];
$lasstseen = $user['last_seen'];
$block = $user['blocked_until'];
            @endphp
        <div class="card-body">
            <p>id : {{$id}}</p>
            <p>username : {{$username}}</p>
            <p>utype : {{$utype}}</p>
            <p>email : {{$email}}</p>
            <p>lastseen : {{$lasstseen}}</p>
            <p>block : {{$block}}</p>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card-header text-center">
            اطلاعات تیکت
        </div>
        @php
            $id = $item['id'];
$topic = $item['topic'];
$code = $item['code'];
$importance = $item['importance'];
$title = $item['title'];
$content = $item['content'];
$userid = $item['userid'];
$status =$item['status'];
$time = $item['time'];
        @endphp
        <div class="card-body">
            <p>id : {{$id}}</p>
            <p>topic : {{$topic}}</p>
            <p>code : {{$code}}</p>
            <p>importance : {{$importance}}</p>
            <p>title : {{$title}}</p>
            <p>content : {{$content}}</p>
            <p>userid : {{$userid}}</p>
            <p>status : {{$status}}</p>
            <p>time : {{$time}}</p>
        </div>
    </div>
</div>
<div class="row" style="margin: 0px">
    <div class="col-md-12">
        <div class="card-header text-center">
            ارسال تیکت
        </div>
        <div class="card-body">
            <form method="post" action="<?php echo route('savereply',['ticket'=>$item['id']])?>">
                <?php echo csrf_field();?>
 <textarea name="content" id="editor" style="direction: rtl">
        &lt;p&gt;This is some sample content.&lt;/p&gt;
    </textarea><br>
                    <input type="hidden" name="userid" value="{{$user['id']}}">
                    <input type="hidden" name="code" value="{{$item['code']}}">
                <input type="submit" name="submit">
            </form>
        </div>
    </div>
</div><br><br>
<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ) )
        .catch( error => {
            console.error( error );
        } );
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
