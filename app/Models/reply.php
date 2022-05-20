<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class reply extends Model
{
    use HasFactory;
    protected $table='reply';
    public $timestamps=false;
    const DB_Reply=['id'=>'id','text'=>'text','time'=>'time','userid'=>'userid','code'=>'code'];
    public static function save_all_reply($text,$time,$userid,$code){
        self::InsertOrIgnore([
            self::DB_Reply['text']=>$text,
            self::DB_Reply['time']=>$time,
            self::DB_Reply['userid']=>$userid,
            self::DB_Reply['code']=>$code,
        ]);
    }
    public static function give_by_id($id){
        return self::where(self::DB_Reply['userid'],$id)->get();
    }
    public static function givebycode($code){
        return self::where(self::DB_Reply['code'],$code)->get();
    }
}
