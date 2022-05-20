<?php

namespace App\Http\Controllers;

use App\Models\afterpayment;
use App\Models\authentic;
use App\Models\header;
use App\Models\newsletter;
use App\Models\product;
use App\Models\reply;
use App\Models\shopping;
use App\Models\ticket;
use App\Models\User;
use App\Models\userpayment;
use App\Models\userpaymentt;
use Hashids\Hashids;
use Illuminate\Support\Facades\Crypt;
use Shetabit\Multipay\Exceptions\InvalidPaymentException;
use Dotenv\Validator;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Evryn\LaravelToman\CallbackRequest;
use Illuminate\Http\Request;
use Shetabit\Payment\Facade\Payment;
use Illuminate\Support\Facades\Auth;
use Morilog\Jalali\Jalalian;
use Illuminate\Support\Carbon;
use Evryn\LaravelToman\Facades\Toman;
use Sadegh19b\LaravelPersianValidation\PersianValidationServiceProvider;
use Sadegh19b\LaravelPersianValidation\PersianValidators;
use Shetabit\Multipay\Invoice;
use function GuzzleHttp\Promise\all;
class IndexController extends Controller
{
    public static function index(){
        $user = Auth::id();
        $shop = shopping::givebyid($user)->count();
        $product = product::all()->toArray();
        $header = header::all()->toArray();
        return view('index',['product'=>$product,'shopcount'=>$shop,'header'=>$header]);
    }
    public function header(){
        return view('header');
    }
public function dashboard(){
        $user = Auth::id();
        $allafter = afterpayment::give_by_id($user)->toArray();
        $allaftercount = afterpayment::give_by_id($user)->count();
    foreach ($allafter as $item) {
        $id = $item['productid'];
        $count = $item['count'];
        $status = $item['status'];
        $time = $item['time'];
        $orderid = $item['orderid'];
        $products = product::getbyid($id)->toArray();
        $allpr[]=['count'=>$count,'pr'=>$products,'status'=>$status,'time'=>$time,'orderid'=>$orderid];
        }
        $shop = shopping::givebyid($user)->count();
        $give = ticket::give_by_id($user)->count();
        $rep = reply::give_by_id($user)->count();
        $date =Jalalian::forge('now')->format('%B %d، %Y');
        $authentic_valid = authentic::if_Valid($user)->toArray();
        $usercr = User::findOrFail($user);
        $crat = $usercr->created_at;
        $datee = Jalalian::forge($crat)->ago();
        if ($allafter == null){
            return view('dashboard',['date'=>$date,'give'=>$give,'shop'=>$shop,'rep'=>$rep,'authentic'=>$authentic_valid,'datee'=>$datee,'allaftercount'=>$allaftercount]);

        }
        return view('dashboard',['date'=>$date,'give'=>$give,'shop'=>$shop,'rep'=>$rep,'authentic'=>$authentic_valid,'datee'=>$datee,'allaftercount'=>$allaftercount,'allpr'=>$allpr]);
}
public function tickett(Request $request)
{
      $user = Auth::id();
      $ticket = ticket::give_by_id($user)->toArray();
      $count = ticket::give_by_id($user)->count();
      $shop = shopping::givebyid($user)->count();
      $reply = reply::give_by_id($user)->toArray();
      $header = header::all()->toArray();
    return view('ticket',['ticket'=>$ticket,'count'=>$count,'reply'=>$reply,'shopcount'=>$shop,'header'=>$header]);
}
public function sendticket(Request $request){
        $result = $request->toArray();
        $importance = $result['importance'];
        $topic = $result['topic'];
        $title = $result['title'];
        $content = $result['content'];
        $id = $result['userid'];
        $unique = bin2hex(random_bytes(6));
        $date = Jalalian::forge('now')->format('%B %d، %Y');
        ticket::save_all_ticket($topic,$importance,$title,$content,$id,$date,'opened',$unique,'unread');
        return redirect()->back()->with('success','تیکت با موفقیت ارسال شد');
}

    public function payment(Request $request)
    {
        if ($request == []){
            return abort(404);
        }else{
        $user = Auth::user();
        $idd = $user->id;
        $name = $user->name;
        $email = $user->email;
        $valid = authentic::if_Valid($idd)->toArray();
        foreach ($valid as $item) {
            $ii = $item;
        }
        if ($ii['status'] == 'taiid'){
            $number = $ii['phone'];
            $address = $ii['address'];
        }else{
            return redirect()->back()->with('success','هویت شما هنوز تایید نشده');
        }
        $uuid = substr(base_convert(sha1(uniqid(mt_rand())), 16, 36), 0, 5);
       $res = $request->toArray();
       if ($res == null){
           abort(404);
       }else{
       $price = $res['price'];
        $request = Toman::orderId('order_'.$uuid)
            ->amount($price)
             ->description('خرید از وب سایت پاک وش')
             ->callback(route('callback'))
             ->mobile($number)
             ->email($email)
             ->name($name)
            ->request();
        if ($request->successful()) {
            $transactionId = $request->transactionId();
            // Store created transaction details for verification
            return $request->pay(); // Redirect to payment URL
        }
        if ($request->failed()) {
           return view('payment.fail');
        }
        }
        }
    }
    public function callback(CallbackRequest $request)
    {
        $request->orderId();
        $tr = $request->transactionId();
        $payment = $request->verify();
        if ($payment->successful()) {
            // Store the successful transaction details
            $referenceId = $payment->referenceId();
            $status = $payment->status();
            $orderiid = $payment->orderId();
            $user = Auth::user();
            $idd = $user->id;
            $name = $user->name;
            $email = $user->email;
            $time =Jalalian::forge('now')->format('%B %d، %Y');
            userpayment::save_userpayment($idd,$tr,$orderiid,$status,$time,$referenceId);
            $give = shopping::givebyid($idd)->toArray();
            foreach ($give as $item) {
                $all = $item;
                $id = $all['id'];
                $userid = $all['userid'];
                $count = $all['count'];
                $proid = $all['productid'];
                $timee = $all['time'];
                $statuss = '1';
                $orderr = $orderiid;
                afterpayment::save_all_afterpayment($userid,$count,$proid,$timee,$statuss,$orderr);
                shopping::deleted_by_id($id);
            }

            return view('payment.afterpayment',['status'=>$status,'tr'=>$tr,'orderid'=>$orderiid]);
        }
        if ($payment->alreadyVerified()) {

        }
        if ($payment->failed()) {
            $orderid = $payment->orderId();
            $transaction = $payment->transactionId();
            $errorcode = $payment->status();
            return view('payment.faildpayment',['orderid'=>$orderid,'trans'=>$transaction,'error'=>$errorcode]);
        }
    }
    public function saveshopp(Request $request){
       $res = $request->toArray();
       $userid = Auth::id();
       $id = $res['id'];
       $authh = authentic::if_Valid($userid)->toArray();
       if ($authh){
       $date = Jalalian::forge('now')->format('%B %d، %Y');
       shopping::save_all_shopping($userid,'1',$id,$date);
       }else{
           return redirect()->back()->with('success','کاربر گرامی لطفا قبل از سفارش احراز هویت کنید');
       }
       return redirect(route('myshoppingcart'))->with('success','یک مورد به سبد خرید شما اضافه شد');
    }
    public function myshoppingcart(){
        $userid = Auth::id();
        $header = header::all()->toArray();
        $shop = shopping::givebyid($userid)->toArray();
        $countt = shopping::givebyid($userid)->count();
            foreach ($shop as $item) {
                $productid = $item['productid'];
                $product = product::getbyid($productid)->toArray();
                $result[] = ['shoping' => $item, 'product' => $product];
            }
            if (empty($result)) {
                return view('shoppingcart', ['count' => $countt]);
            }
            foreach ($result as $item) {
                $price = $item['product'][0]['price'];
                $count = $item['shoping']['count'];
                $new[] = ['price' => $price, 'count' => $count];
                $shoping = $item['shoping'];
                $product = $item['product'];
                $allss[] = ['shoping' => $shoping, 'product' => $product];
            }
            foreach ($new as $n) {
                $p = $n['price'];
                $c = $n['count'];
                $a[] = $p * $c;
            }
            $allsum = array_sum($a) + 5000;
            foreach ($shop as $shp) {
                $item = $shp['productid'];
                $all = product::getbyid($item)->toArray();
                $alls = shopping::get_id($item)->toArray();
                foreach ($all as $item) {
                    $news[] = $item;
                }
            }
            $ifvaliid = authentic::if_Valid($userid)->toArray();
            if (empty($ifvaliid)){
                return redirect()->back()->with('success','کاربر گرامی لطفا قبل از ورود به سبد خرید احراز هویت کنید');
            }else{
                foreach ($ifvaliid as $valiid) {
                    $statuss = $valiid['status'];
                }
            }
            return view('shoppingcart', ['new' => $news, 'count' => $countt, 'newprice' => $allsum, 'all' => $allss,'header'=>$header,'status'=>$statuss]);
    }
    public function savecount(Request $request){
        $res = $request->toArray();
        $shopid = $res['shopid'];
        $count = $res['count'];
        shopping::update_count($shopid,$count);
        return redirect()->back()->with('success','تعداد با موفقیت تغییر کرد');
    }
    public function delteshoppingcart(Request $request){
        $res = $request->toArray();
        $shopid = $res['shopid'];
        shopping::deleted_by_id($shopid);
        return redirect()->back()->with('success','آیتم با موفقیت حذف شد');
    }
    public function authenticc(){
        $date =Jalalian::forge('now')->format('%B %d، %Y');
        $userid = Auth::id();
        $user = User::findOrFail($userid);
        $useremail = $user->email;
        $username = $user->name;
        $authentic_valid = authentic::if_Valid($userid)->toArray();
        $crat = $user->created_at;
        $datee = Jalalian::forge($crat)->ago();
        return view('authentic',['date'=>$date,'useremail'=>$useremail,'username'=>$username,'userid'=>$userid,'authentic'=>$authentic_valid,'datee'=>$datee]);
    }
    public function authenticsave(Request $request)
    {
        $rules = ['ir_postal_code'];
        $phone = ['ir_mobile'];
        $home = ['ir_phone_with_code'];
        $request->validate([
            'name' => 'required|persian_alpha|string|max:30',
            'hamrah' => $phone,
            'homephone' => $home,
            'postalcode' => $rules,
        ]);
        $res = $request->toArray();
        $userphone = Auth::user()->phone;
        $userid = $res['userid'];
        $name = $res['name'];
        $homenumber = $res['homephone'];
        $postal = $res['postalcode'];
        $status = 'unread';
        $time = $date = Jalalian::forge('now')->format('%B %d، %Y');
        $address = $res['manzel'];
        $authentic_valid = authentic::if_Valid($userid)->toArray();
        if ($authentic_valid) {
            return redirect()->back()->with('success', 'در انتظار تایید');
        } else {
            authentic::save_all_auth($userid, $name, $userphone, $homenumber, $address, $postal, $status, $time);
            return redirect()->back()->with('success', 'اطلاعات شما ارسال شد منتظر بمانید تا تایید شود');
        }
    }
    public function newsletter(Request $request)
    {
        $res = $request->toArray();
        $email = $res['email'];
        $time = $date = Jalalian::forge('now')->format('%B %d، %Y');
        $eemail = newsletter::getid($email)->toArray();
        if (!empty($eemail)){
            return redirect()->back()->with('success','ایمیل شما قبلا ثبت شده');
        }else{
            newsletter::save_newsletter($email,$time);
            return redirect()->back()->with('success','ایمیل شما ثبت شد');

        }
    }
    public function showticket(Request $request){
        $hash = $request->hash;
        $hashids = new Hashids();
        $crypt = Crypt::decrypt($hash);
        $hh = $hashids->decode($crypt);
        foreach ($hh as $item) {
            $it = $item;
        }
        $user = Auth::id();
        $shop = shopping::givebyid($user)->count();
        $giiv = ticket::give_id($it)->toArray();
        foreach ($giiv as $ii){
            $code = $ii['code'];
            $rrep = reply::givebycode($code);
            if ($rrep !== '[]'){
                $reps = $rrep->toArray();
            }
        }
        $usercr = User::findOrFail($user);
        $namee = $usercr->name;
        $header = header::all()->toArray();
        return view('showticket',['giv'=>$giiv,'shopcount'=>$shop,'reply'=>$reps,'name'=>$namee,'header'=>$header]);
    }
    public function faq(){
        $user = Auth::id();
        $shop = shopping::givebyid($user)->count();
        return view('askedquestion',['shopcount'=>$shop]);
    }
}
