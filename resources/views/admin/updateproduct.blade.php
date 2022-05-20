<html>
<head>
    <title>update product</title>
</head>
<body>
@foreach($product as $pro)
    @php
    $id = $pro['id'];
    $title = $pro['title'];
    $icon = $pro['icon'];
    $nonint = $pro['nonint'];
    $price = $pro['price'];
    @endphp
    @endforeach
<form method="post" action="<?php echo route('savepro')?>">
    <?php
    echo csrf_field();
    ?>
    <label for="id">id :</label>
    <input type="text" name="id" value="{{$id}}">
    <br><br>
        <label for="id">icon :</label>
        <input type="text" name="icon" value="{{$icon}}">
        <br><br>
        <label for="id">title :</label>
        <input type="text" name="title" value="{{$title}}">
        <br><br>
        <label for="id">nonint :</label>
        <input type="number" name="nonint" value="{{$nonint}}">
        <br><br>
        <label for="id">price :</label>
        <input type="number" name="price" value="{{$price}}">
        <br><br>
    <input type="submit" name="sub" value="submit">
</form>
</body>
</html>
