<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class describe extends Model
{
    use HasFactory;
    protected $table='describe';
    public $timestamps=false;
    const table_describe=['id'=>'id','desc'=>'desc'];
    public static function save_all_desc($desc){
        self::insertOrIgnore([
            self::table_describe['desc'] => $desc,

        ]);
    }
    public static function deleteds($id){
        return self::where(self::table_describe['id'],$id)->delete();
    }
}
