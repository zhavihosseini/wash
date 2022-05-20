<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userpaymentt extends Model
{
    use HasFactory;
    protected $table='userpayment';
    public $timestamps = false;
    const Userpayment=['id'=>'id','userid'=>'userid','transactionid'=>'transactionid','orderid'=>'orderid','status'=>'status','time'=>'time','refrence'=>'refrence'];
    public static function save_userpayment($userid,$tr,$orderid,$status,$time,$refrence){
        self::InsertOrIgnore([
            self::Userpayment['userid']=>$userid,
            self::Userpayment['transactionid']=>$tr,
            self::Userpayment['orderid']=>$orderid,
            self::Userpayment['status']=>$status,
            self::Userpayment['refrence']=>$refrence,
            self::Userpayment['time']=>$time,
        ]);
    }
    public static function give_by_user($id){
        return self::where(self::Userpayment['userid'],$id)->get();
    }
}
