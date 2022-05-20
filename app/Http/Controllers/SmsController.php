<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use phpDocumentor\Reflection\DocBlock\Tags\Uses;
use Sadegh19b\LaravelPersianValidation\PersianValidators;
use Spatie\SchemaOrg\Car;
use Trez\RayganSms\Facades\RayganSms;
use Ghasedak\GhasedakApi;
class SmsController extends Controller
{
    public function loginsms(){
        return view('auth.loginsms');
    }
    public function checkusers(Request $request){
        $res = $request->toArray();
       $bb =  Validator::make($res,[
            'phone' => ['required', 'string','ir_mobile:zero'],
           'g-recaptcha-response'=>'required',
            ])->validate();
       if ($bb){
           $phone = $request->toArray()['phone'];
           $user = User::where('phone',$phone)->first();
           if ($user !== null){
           $logs = $user->toArray();
          if ($logs) {
              $uid = $logs['id'];
              $number = mt_rand(10000, 99999);
              $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
              $api->SendSimple(
                  $phone,  // receptor
                  "کد ورود شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
                  "10008566"    // choose a line number from your account
              );
              $crbon = Carbon::now()->addSeconds('60')->toArray()['formatted'];
              User::save_code($uid, $number,$crbon);
              $hashids = new Hashids();
              $valid = $hashids->encode($phone);
              $cr = Crypt::encrypt($valid);
              return \redirect(route('smscode', ['phone' => $cr]))->with('err', '  کد ورود برای شما به شماره ی' . $phone . 'ارسال شد ');
          }else{
              return redirect()->back()->with('message','Your phone not invalid');
          }
          }else{
              return redirect()->back()->with('message','Your phone not invalid');
          }
       }
    }
    public function smscode(Request $request)
    {$res = $request->toArray();
    if ($res !== []) {
        $phone = $request->toArray()['phone'];
        return view('checkcode', ['data' => $phone]);
    }else{
        abort(404);
    }
    }
    public function checkscode(Request $request){
        $res = $request->toArray();
        $vb = Validator::make($res,[
            'phone'=>['required'],
            'g-recaptcha-response'=>'required',
        ])->validate();
        if ($vb) {
            $re = $request->toArray()['ph'];
            $dd = Crypt::decrypt($re);
            $hashids = new Hashids();
            $valid = $hashids->decode($dd);
            $phones = $valid;
            $code = $request->phone;
            $user = User::where('phone',$phones)->first();
            $now = Carbon::now()->toArray()['formatted'];
            $exp = $user->toArray()['exp_time'];
            $logs = $user->toArray()['verification_code'];
            if ($code == $logs and $exp > $now){
                Auth::login($user);
                return \redirect(route('dashboard'));
            }else{
                return redirect()->back()->with('message','Your Code not invalid');
            }
        }else{
            return redirect()->back()->with('message','Your Code not invalid');
        }
    }
    public function resendcode(Request $request){
        $res = $request->toArray();
        $val = $res['val'];
        $dd = Crypt::decrypt($val);
        $hashids = new Hashids();
        $valid = $hashids->decode($dd);
        $user = User::where('phone',$valid)->first();
        $exp = $user->toArray()['exp_time'];
        $phones = $user->toArray()['phone'];
        $uid = $user->toArray()['id'];
        $now = Carbon::now()->toArray()['formatted'];
        $crbn = Carbon::now()->addSeconds('60')->toArray()['formatted'];
        if ($now > $exp){
            $number = mt_rand(10000, 99999);
            $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
            $api->SendSimple(
                $phones,  // receptor
                "کد ورود شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
                "10008566"    // choose a line number from your account
            );
            User::save_code($uid, $number,$crbn);
            $hashids = new Hashids();
            $valid = $hashids->encode($phones);
            $cr = Crypt::encrypt($valid);
            return \redirect(route('smscode',['phone' => $cr]))->with('err', '  کد ورود برای شما به شماره ی' . $phones . 'ارسال شد ');
        }else{
            $after = Carbon::now()->diffInSeconds($exp);
            return redirect()->back()->with('message','کاربر گرامی کد تایید شما تا '.$after.'ثانیه دیگر قابل استفاده میباشد');
        }
    }
    public function verifyphone(){
      /*  $user = Auth::user()->toArray();
        $id = $user['id'];
        $phone = $user['phone'];
        $now = Carbon::now()->toArray()['formatted'];
        $crbn = Carbon::now()->addSeconds('60')->toArray()['formatted'];
        User::change_time($id,$crbn);
        if ($crbn > $now){
        $number = mt_rand(10000, 99999);
        $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
        $api->SendSimple(
            $phone,  // receptor
            "کد تایید شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
            "10008566"    // choose a line number from your account
        );
        User::save_code($id, $number,$crbn);
        $hashids = new Hashids();
        $valid = $hashids->encode($phone);
        $cr = Crypt::encrypt($valid);*/
        return view('auth.verifyphone');
    }
    public function sendverify(Request $request){
        $res = $request->toArray();
        $vb = Validator::make($res,[
            'phone'=>['required','ir_mobile:zero'],
            'g-recaptcha-response'=>'required',
        ])->validate();
        if ($vb){
            $user = Auth::user()->toArray()['phone'];
           $phone = $res['phone'];
           if ($user == $phone){
               $us = Auth::user()->toArray()['id'];
               $crbn = Carbon::now()->addSeconds('60')->toArray()['formatted'];
               $number = mt_rand(10000, 99999);
               $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
               $api->SendSimple(
                   $user,  // receptor
                   "کد ورود شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
                   "10008566"    // choose a line number from your account
               );
               User::save_code($us, $number,$crbn);
               return \redirect(route('verifycodesms'))->with('err', '  کد ورود برای شما به شماره ی' . $user . 'ارسال شد ');
           }else{
               return redirect()->back()->with('message','شماره تلفن شما اشتباه است');
           }
        }else{
            return redirect()->back()->with('message','Your Code not invalid');
        }
    }
    public function verifycodesms(Request $request){
        return view('auth.checksmsverify');
    }
    public function verifysubmit(Request $request){
        $res = $request->toArray();
        $vb = Validator::make($res,[
            'phone'=>['required'],
            'g-recaptcha-response'=>'required',
        ])->validate();
        if ($vb) {
            $phone = $res['phone'];
            $usercode = Auth::user()->toArray()['verification_code'];
            $userid = Auth::user()->toArray()['id'];
            $usertime = Auth::user()->toArray()['exp_time'];
            $now = Carbon::now()->toArray()['formatted'];
            if ($usertime > $now) {
                if ($phone == $usercode) {
                    User::verifythis($userid,$now);
                    return \redirect(route('dashboard'));
                    $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
                    $api->SendSimple(
                        $user,  // receptor
                        "کاربر گرامی شماره تلفن شما با موفقیت تایید شد", // message
                        "10008566"    // choose a line number from your account
                    );
                }else{
                    return \redirect()->back()->with('message','کد نامعتبر است');
                }
            }else{
                return \redirect()->back()->with('message','کد نامعتبر است');
            }
        }
    }
    public function resendverify(){
        $now = Carbon::now()->toArray()['formatted'];
        $crbn = Carbon::now()->addSeconds('60')->toArray()['formatted'];
        $user = Auth::user()->toArray();
        $exp = $user['exp_time'];
        $phones = $user['phone'];
        $userid = $user['id'];
        $after = Carbon::now()->diffInSeconds($exp);
        if ($now > $exp){
            $number = mt_rand(10000, 99999);
            $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
            $api->SendSimple(
                $phones,  // receptor
                "کد ورود شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
                "10008566"    // choose a line number from your account
            );
            User::save_code($userid, $number,$crbn);
            return \redirect()->back()->with('err', '  کد ورود برای شما به شماره ی' . $phones . 'ارسال شد ');
        }else{
            return \redirect()->back()->with('message','کاربر گرامی کد تایید شما تا '.$after.'ثانیه دیگر قابل استفاده میباشد');
        }
    }
    public function changephones(){
        return view('auth.changephone');
    }
    public function savechangephones(Request $request){
        $res = $request->toArray();
        $vb = Validator::make($res,[
            'phone'=>['required','ir_mobile:zero'],
            'g-recaptcha-response'=>'required',
        ])->validate();
        if ($vb){
            $user = Auth::user()->toArray();
            $id = $user['id'];
            $phones = $res['phone'];
            User::changephone($id,$phones);
            $number = mt_rand(10000, 99999);
            $api = new GhasedakApi(env('GHASEDAKAPI_KEY'));
            $num = Auth::user()->toArray()['phone'];
            $crbn = Carbon::now()->toArray()['formatted'];
            $api->SendSimple(
                $num,  // receptor
                "کد ورود شما در وبسایت میلیونر لایف ، مدت زمان استفاده از این کد 60 ثانیه می باشد :  $number", // message
                "10008566"    // choose a line number from your account
            );
            User::save_code($id,$number,$crbn);
            return \redirect(route('verifycodesms'));
        }else{
            return redirect()->back()->with('message','Your Code not invalid');
        }
    }
}
