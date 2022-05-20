<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>reply</title>
</head>
<body>
<div class="container-fluid bg-light">
    REPLY
</div>
<div class="container">
    <br>
    <div class="row">
        @foreach($all as $ti)
            @php
                $topic = $ti['topic'];
                $code = $ti['code'];
                $importance = $ti['importance'];
                $title = $ti['title'];
                $content = $ti['content'];
                $status = $ti['status'];
                $time = $ti['time'];
                $ansr = $ti['ansr'];
            @endphp
            <div class="card-body" style="box-shadow: 0px 0px 2px 1px lightgray">
                <P style="direction: rtl" > وضعیت : @if($status == 'opened')<span style="padding: 10px;color: green;">
                    باز
                </span>
                    @else
                        <span style="padding: 10px;color: red;">
                   بسته
                </span>
                    @endif
                </P>
                <div class="row">
                    <P style="direction: rtl" class="col-md-3"> موضوع : <span style="padding: 10px">
                    {{$topic}}
                </span></P>
                    <P style="direction: rtl" class="col-md-3">کد تیکت :  <span style="padding: 10px">
                    {{$code}}
                </span></P>
                    <P style="direction: rtl" class="col-md-3"> اهمیت تیکت : <span style="padding: 10px">
                    {{$importance}}
                </span>
                    </P>
                    <P style="direction: rtl" class="col-md-3">زمان ارسال : <span style="padding: 10px">
                    {{$time}}
                </span></P>
                </div>
                <div class="row">
                    <P style="direction: rtl" class="col-md-12">عنوان :  <span style="padding: 10px">
                    {{$title}}
                </span></P>
                </div>
                <div class="row">
                    <P style="direction: rtl" class="col-md-12">محتوا : <span style="padding: 10px">
                    {{$content}}
                </span></P>
                </div>
                <div class="row">
                    <P style="direction: rtl" class="col-md-12">وضعیت پاسخ :<span style="padding: 10px">
                    @if($ansr == 'read')
                                <span style="color: green">پاسخ داده شد</span>
                            @else
                                <span style="color: black"> در انتظار ...</span>
                            @endif
                </span></P>
                </div>
            </div><br>
        @endforeach
    </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
</body>
</html>
