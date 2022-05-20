<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class newsletter extends Model
{
    use HasFactory;
    protected $table='newsletter';
    public $timestamps=false;
    const DB_Newsletter=['id'=>'id','email'=>'email','time'=>'time'];
    public static function save_newsletter($email,$time){
        self::InsertOrIgnore([
            self::DB_Newsletter['email']=>$email,
            self::DB_Newsletter['time']=>$time,
        ]);
    }
    public static function getid($email){
        return self::where(self::DB_Newsletter['email'],'=',$email)->get();
    }
}
