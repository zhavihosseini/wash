<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class authentic extends Model
{
    use HasFactory;
    protected $table='authentic';
    public $timestamps=false;
    const DB_TABLE_AUTH=['id'=>'id','userid'=>'userid','name'=>'name','phone'=>'phone','homenumber'=>'homenumber','postalcode'=>'postalcode','status'=>'status','time'=>'time','address'=>'address'];
    public static function save_all_auth($userid,$name,$phone,$homenumber,$address,$postalcode,$status,$time){
        self::InsertOrIgnore([
            self::DB_TABLE_AUTH['userid']=>$userid,
            self::DB_TABLE_AUTH['name']=>$name,
            self::DB_TABLE_AUTH['phone']=>$phone,
            self::DB_TABLE_AUTH['address']=>$address,
            self::DB_TABLE_AUTH['homenumber']=>$homenumber,
            self::DB_TABLE_AUTH['postalcode']=>$postalcode,
            self::DB_TABLE_AUTH['status']=>$status,
            self::DB_TABLE_AUTH['time']=>$time,
        ]);
    }
    public static function if_Valid($id){
        return self::where(self::DB_TABLE_AUTH['userid'],$id)->get();
    }
    public static function taiid_by_id($id,$status){
        return self::where(self::DB_TABLE_AUTH['id'],$id)->update([
            self::DB_TABLE_AUTH['status']=>$status,
        ]);
    }
    public static function taiidna_by_id($id,$status){
        return self::where(self::DB_TABLE_AUTH['id'],$id)->update([
            self::DB_TABLE_AUTH['status']=>$status,
        ]);
    }
}
