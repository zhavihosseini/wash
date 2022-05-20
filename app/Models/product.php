<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table='product';
    public $timestamps=false;
    const DB_Product=['id'=>'id','icon'=>'icon','title'=>'title','nonint'=>'nonint','price'=>'price'];
    public static function save_all_product($icon,$title,$nonint,$price){
        self::InsertOrIgnore([
           self::DB_Product['icon']=>$icon,
           self::DB_Product['title']=>$title,
           self::DB_Product['nonint']=>$nonint,
           self::DB_Product['price']=>$price,
        ]);
    }
    public static function deletepr($id){
        return self::where(self::DB_Product['id'],$id)->delete();
    }
    public static function getbyid($id){
        return self::where(self::DB_Product['id'],$id)->get();
    }
    public static function updatesproduct($id,$icon,$title,$nonint,$price)
    {
        self::where(self::DB_Product['id'], $id)->update([
            self::DB_Product['icon'] => $icon,
            self::DB_Product['title'] => $title,
            self::DB_Product['nonint'] => $nonint,
            self::DB_Product['price'] => $price,
        ]);
    }
}
