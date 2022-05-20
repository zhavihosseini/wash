<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Self_;

class afterpayment extends Model
{
    use HasFactory;
    protected $table='afterpayment';
    public $timestamps=false;
    const DB_SHOpping=['id'=>'id','status'=>'status','userid'=>'userid','count'=>'count','productid'=>'productid','time'=>'time','orderid'=>'orderid'];
    public static function save_all_afterpayment($userid,$count,$productid,$time,$status,$orderid){
        self::InsertOrIgnore([
            self::DB_SHOpping['userid']=>$userid,
            self::DB_SHOpping['count']=>$count,
            self::DB_SHOpping['status']=>$status,
            self::DB_SHOpping['productid']=>$productid,
            self::DB_SHOpping['time']=>$time,
            self::DB_SHOpping['orderid']=>$orderid,
        ]);
    }
    public static function give_by_id($id){
        return self::where(self::DB_SHOpping['userid'],$id)->get();
    }
    public static function give_by_status_1(){
        return self::where(self::DB_SHOpping['status'],'=','1')->orderBy('id','DESC')->get();
    }
    public static function give_by_status_2(){
        return self::where(self::DB_SHOpping['status'],'=','2')->orderBy('id','DESC')->get();
    }
    public static function give_by_status_3(){
        return self::where(self::DB_SHOpping['status'],'=','3')->orderBy('id','DESC')->get();
    }
    public static function give_by_status_4(){
        return self::where(self::DB_SHOpping['status'],'=','4')->orderBy('id','DESC')->get();
    }
    public static function give_to_daryaft($id,$status){
        return self::where(self::DB_SHOpping['id'],$id)->update([
            self::DB_SHOpping['status']=>$status,
        ]);
    }
    public static function deletebyid($id){
        return self::where(self::DB_SHOpping['id'],$id)->delete();
    }
    public static function give_idd($id){
        return self::where(self::DB_SHOpping['id'],$id)->get();
    }
    public static function sumid($id){
        return self::where(self::DB_SHOpping['orderid'],'!=',$id)->get();
    }
    public static function sunid($id){
        return self::where(self::DB_SHOpping['orderid'],$id)->get();
    }
    public static function gg(){
        return self::all()->where(self::DB_SHOpping['status'],2);
    }
    public static function ww($orderid,$userid){
        return self::where(self::DB_SHOpping['orderid'],$orderid)->where(self::DB_SHOpping['status'],'=','2')->where(self::DB_SHOpping['userid'],$userid)->get();
    }
}
