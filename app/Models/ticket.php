<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ticket extends Model
{
    use HasFactory;
    protected $table='ticket';
    public $timestamps=false;
    const DB_Ticket=['id'=>'id','ansr'=>'ansr','code'=>'code','status'=>'status','topic'=>'topic','importance'=>'importance','title'=>'title','content'=>'content','userid'=>'userid','time'=>'time'];
    public static function save_all_ticket($topic,$importance,$title,$content,$userid,$time,$status,$code,$ansr){
        self::InsertOrIgnore([
            self::DB_Ticket['topic']=>$topic,
            self::DB_Ticket['ansr']=>$ansr,
            self::DB_Ticket['importance']=>$importance,
            self::DB_Ticket['title']=>$title,
            self::DB_Ticket['content']=>$content,
            self::DB_Ticket['userid']=>$userid,
            self::DB_Ticket['code']=>$code,
            self::DB_Ticket['status']=>$status,
            self::DB_Ticket['time']=>$time,
        ]);
    }
    public static function give_by_id($id){
        return self::where(self::DB_Ticket['userid'],$id)->get();
    }
    public static function closed_by_id($id,$status){
        return self::where(self::DB_Ticket['id'],$id)->update([
           self::DB_Ticket['status']=>$status,
        ]);
    }
    public static function give_id($id){
        return self::where(self::DB_Ticket['id'],$id)->get();
    }
    public static function read_by_id($id,$ansr){
        return self::where(self::DB_Ticket['id'],$id)->update([
            self::DB_Ticket['ansr']=>$ansr,
        ]);
    }
    public static function get_by_code($code){
        return self::where(self::DB_Ticket['code'],$code)->get();
    }
}
