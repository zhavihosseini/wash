<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class header extends Model
{
    use HasFactory;
    protected $table='header';
    public $timestamps=false;
    const DB_Header=['id'=>'id','link'=>'link','text'=>'text','desc'=>'desc'];
    public static function save_all_header($link,$text,$desc){
        self::InsertOrIgnore([
            self::DB_Header['link']=>$link,
            self::DB_Header['text']=>$text,
            self::DB_Header['desc']=>$desc,
        ]);
    }
    public static function delete_id($id){
        return self::where(self::DB_Header['id'],$id)->delete();
    }
    public static function give_id($id){
        return self::where(self::DB_Header['id'],$id)->get();
    }
    public static function update_id($id,$text,$link,$time){
        return self::where(self::DB_Header['id'],$id)->update([
            self::DB_Header['text']=>$text,
            self::DB_Header['link']=>$link,
            self::DB_Header['desc']=>$time,
        ]);
    }
}

