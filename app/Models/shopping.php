<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class shopping extends Model
{
    use HasFactory;
    protected $table='shopping';
    public $timestamps=false;
    const DB_SHOpping=['id'=>'id','userid'=>'userid','count'=>'count','productid'=>'productid','time'=>'time'];
    public static function save_all_shopping($userid,$count,$productid,$time){
        self::InsertOrIgnore([
            self::DB_SHOpping['userid']=>$userid,
            self::DB_SHOpping['count']=>$count,
            self::DB_SHOpping['productid']=>$productid,
            self::DB_SHOpping['time']=>$time,
        ]);
    }
    public static function givebyid($id){
        return self::where(self::DB_SHOpping['userid'],$id)->get();
    }
    public static function get_id($id){
        return self::where(self::DB_SHOpping['productid'],$id)->get();
    }
    public static function update_count($id,$count){
        return self::where(self::DB_SHOpping['id'],$id)->update([
            self::DB_SHOpping['count']=>$count,
        ]);
    }
    public static function deleted_by_id($id){
        return self::where(self::DB_SHOpping['id'],$id)->delete();
    }
    public static function prup($id,$count){
        return self::where(self::DB_SHOpping['productid'],$id)->update([
            self::DB_SHOpping['count']=>$count,
        ]);
    }
}
