<!DOCTYPE html>
<html lang="en">
<head>
    <title>edituser</title>
</head>
<body>
@foreach($user as $users)
    @php
        $id = $users['id'];
        $name = $users['name'];
        $username = $users['username'];
        $utype = $users['utype'];
        $email = $users['email'];
        $emailver = $users['email_verified_at'];
        $block = $users['blocked_until'];
        $last_seen=$users['last_seen'];
        $h = new \Hashids\Hashids();
        $hash = $h->encode($id);
        $crypt = \Illuminate\Support\Facades\Crypt::encrypt($hash);
    @endphp
    @endforeach
<form method="get" action="<?php echo route('editus',['hash'=>$crypt])?>">
    <?php
    echo csrf_field();
    ?>
    <label for="id">id :</label>
    <input type="text" name="id" value="{{$id}}">
    <br><br>
    <label for="name">name :</label>
    <input type="text" name="name" value="{{$name}}">
    <br><br>
    <label for="username">username :</label>
    <input type="text" name="username" value="{{$username}}">
    <br><br>
    <label for="utype">utype :</label>
    <input type="text" name="utype" value="{{$utype}}">
    <br><br>
    <label for="email">email :</label>
    <input type="text" name="email" value="{{$email}}">
    <br><br>
    <label for="emailver">email-ver :</label>
    <input type="text" name="emailver" value="{{$emailver}}">
    <br><br>
    <label for="block">block :</label>
    <input type="text" name="block" value="{{$block}}">
    <br><br>
    <input type="submit">
    <br><br>
</form>
</body>
</html>

