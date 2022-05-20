<?php

namespace App\Models;

use http\Env\Request;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        /*'username',*/
        'utype',
        'phone',
        'password',
        'blocked_until',
        'verification_code',
        'exp_time',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $dates = [
        'blocked_until'
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'phone_verified_at' => 'datetime',
    ];
    public static function get_phone($id){
        return self::where('phone',$id)->get();
    }
public static function save_code($id,$code,$exp){
        return self::where('id',$id)->update([
            'verification_code'=>$code,
            'exp_time'=>$exp,
        ]);
}
    public function hasVerifiedPhone()
    {
        return ! is_null($this->phone_verified_at);
    }

    public function markPhoneAsVerified()
    {
        return $this->forceFill([
            'phone_verified_at' => $this->freshTimestamp(),
        ])->save();
    }
    public static function change_time($id,$time){
        return self::where('id',$id)->update([
            'exp_time'=>$time,
        ]);
    }
    public static function verifythis($id,$verify){
        return self::where('id',$id)->update([
            'phone_verified_at' => $verify,
        ]);
    }
    public static function changephone($id,$phone){
        return self::where('id',$id)->update([
            'phone'=>$phone,
        ]);
    }
}
