<?php

namespace App\Http\Controllers;

use App\Mail\newslettermail;
use App\Models\afterpayment;
use App\Models\authentic;
use App\Models\describe;
use App\Models\header;
use App\Models\newsletter;
use App\Models\product;
use App\Models\reply;
use App\Models\ticket;
use App\Models\User;
use App\Models\userpayment;
use Dnsimmons\OpenWeather\OpenWeather;
use Hashids\Hashids;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Mail;
use Morilog\Jalali\Jalalian;
use Carbon\Carbon;
use Illuminate\Cache;
use Illuminate\Support\Facades\DB;
class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }
    public function admin(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $TICKET = ticket::all()->count();
        $username = Auth::user()->name;
        $jomle = describe::all()->toArray();
        $shuff = Arr::random($jomle,1);
        $shuf=Arr::random($shuff,1);
        $allafter = afterpayment::all()->count();
        $users = User::all()->sortByDesc->toArray();
        $uscount = Auth::user()->count();
        $date =Jalalian::forge('now')->format('%B %d، %Y');
        $newsletter = newsletter::all()->count();
        return view('admin.admin',['name'=>$username,'jomle'=>$shuf,'date'=>$date,'users'=>$users,'ticket'=>$TICKET,'news'=>$newsletter,'uscount'=>$uscount,'afterpa'=>$allafter]);
    }else{
        abort(404);
        }
    }
    public function doc(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $all = describe::all()->toArray();
            return view('admin.document',['all'=>$all]);
        }else{
            abort(404);
        }
    }
    public function save(Request $request)
    {
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $result = $request->toArray();
            $desc = $result['desc'];
            describe::save_all_desc($desc);
            return redirect()->back();
        }else{
            abort(404);
        }
    }
    public function delete(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $result = $request->toArray();
            $hash = new Hashids();
            $id = $result['id'];
            $dehash = Crypt::decrypt($id);
            $f = $hash->decode($dehash);
            describe::deleteds($f);
            return redirect()->back();
        }else{
            abort(404);
        }
    }
    public function edit(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {            $res = $request['hash'];
            $hash = new Hashids();
            $dec = Crypt::decrypt($res);
            $dehash = $hash->decode($dec);
            $user = User::findOrFail($dehash);
            $merj = $user->toArray();
            return view('admin.edituser',['user'=>$merj]);
        }else{
            abort(404);
        }
    }
    public function editus(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $name = $res['name'];
            $username = $res['username'];
            $utype = $res['utype'];
            $email = $res['email'];
            $emailver = $res['emailver'];
            $block = $res['block'];
            $user = User::findOrFail($id);
            $user->name=$name;
            $user->username = $username;
            $user->utype=$utype;
            $user->email=$email;
            $user->email_verified_at=$emailver;
            $user->blocked_until=$block;
            $user->saveQuietly();
            return redirect()->route('admin');
        }else{
            abort(404);
        }
    }
    public function product(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $product = product::all()->toArray();
            return view('admin.product',['product'=>$product]);
        }else{
            abort(404);
        }
    }
    public function saveproduct(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $icon = $res['icon'];
            $title = $res['title'];
            $nonint = $res['nonint'];
            $price = $res['price'];
            product::save_all_product($icon, $title, $nonint, $price);
            return redirect()->back();
        }else{
            abort(404);
        }
    }
    public function deleteproduct(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
           $id = $res['id'];
           $hash = new Hashids();
           $cr = Crypt::decrypt($id);
           $dehash = $hash->decode($cr);
           product::deletepr($dehash);
           return redirect()->back();
        }else{
        abort(404);
        }
    }
    public function updateproduct(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $hash = new Hashids();
            $cr = Crypt::decrypt($id);
            $dehash = $hash->decode($cr);
           $pro =  product::getbyid($dehash);
            return view('admin.updateproduct',['product'=>$pro]);
        }else{
        abort(404);
        }
    }
    public function savepro(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $icon = $res['icon'];
            $title = $res['title'];
            $nonint = $res['nonint'];
            $price = $res['price'];
            product::updatesproduct($id,$icon,$title,$nonint,$price);
            return redirect()->route('admin');
        }else{
        abort(404);
        }
    }
    public function ticket(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $allticket = DB::table("ticket")->get();
            $count = $allticket->count();
            $paginate = DB::table("ticket")->orderBy('id','DESC')->paginate('50');
            return view('admin.ticket',['ticket'=>$allticket,'count'=>$count,'paginate'=>$paginate]);
        }else{
        abort(404);
        }
    }
    public function destroyticket($id){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            DB::table("ticket")->delete($id);
        return response()->json(['success' => "Product Deleted successfully.", 'tr' => 'tr_' . $id]);
    }else{
        abort(404);
        }
    }
    public function deleteAllticket(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $ids = $request->ids;
            DB::table("ticket")->whereIn('id', explode(",", $ids))->delete();
            return response()->json(['success' => "Products Deleted successfully."]);
        }else{
            abort(404);
        }

    }
    public function closedticket(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $status = $res['close'];
            ticket::closed_by_id($id,$status);
            return redirect()->back();
        }else{
        abort(404);
        }
    }
    public function reply(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $idd = ticket::give_id($id)->toArray();
            foreach ($idd as $item) {
               $item = $item;
            }
            $col = $item['userid'];
            $user = User::findOrFail($col)->toArray();
            return view('admin.replyticket',['item'=>$item,'user'=>$user,'userid'=>$col]);
        }else{
        abort(404);
        }
    }
    public function savereply(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $contet = $res['content'];
            $userid = $res['userid'];
            $code = $request['code'];
            $ticket = $request['ticket'];
            ticket::read_by_id($ticket,'read');
            $user =  User::findOrFail($userid);
            $email = $user->email;
            $name = $user->name;
            $time = Jalalian::forge('now')->format('%B %d، %Y');
            reply::save_all_reply($contet,$time,$userid,$code);
            Mail::to($email)->send(new \App\Mail\mail($code,$time,$name));
            return redirect()->back();
        }else{
            abort(404);
        }
        }
        public function allrep(){
            if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
                $allrep = DB::table("reply")->get();
                $count = $allrep->count();
                $paginate = DB::table("reply")->orderBy('id','DESC')->paginate('50');
return view('admin.reply',['allrep'=>$allrep,'count'=>$count,'paginate'=>$paginate]);
            }else{
            abort(404);
            }
        }
    public function destroyrep($id){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            DB::table("reply")->delete($id);
            return response()->json(['success' => "Product Deleted successfully.", 'tr' => 'tr_' . $id]);
        }else{
            abort(404);
        }
    }
    public function deleteAllrep(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $ids = $request->ids;
            DB::table("reply")->whereIn('id', explode(",", $ids))->delete();
            return response()->json(['success' => "Products Deleted successfully."]);
        }else{
            abort(404);
        }

    }
    public function viewrep(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $give = ticket::get_by_code($id);
            $all = $give->toArray();
            if ($all == []){
                echo 'Its Null,deleted or anything.';
            }else {
                return view('admin.allrep', ['all' => $all]);
            }
        }else{
        abort(404);
        }
    }
    public function authentic(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $allauth = DB::table("authentic")->orderBy('id','desc')->get()->toArray();
            $forc = DB::table("authentic")->get();
            $count = $forc->count();
            $paginate = DB::table("authentic")->orderBy('id','desc')->paginate('50');
            return view('admin.authentics',['allauth'=>$allauth,'count'=>$count,'paginate'=>$paginate]);
        }else{
        abort(404);
        }
    }
    public function taiidshod(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $status = 'taiid';
            authentic::taiid_by_id($id,$status);
            return redirect()->back();
        }else{
abort(404);
        }
    }
    public function taiidnashod(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $id = $res['id'];
            $status = 'read';
            authentic::taiidna_by_id($id,$status);
            return redirect()->back();
        }else{
        abort(404);
        }
    }
    public function newsletterr(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $allnews = DB::table("newsletter")->get();
            $count = $allnews->count();
            $paginate = newsletter::paginate(20);
            return view('admin.newsletter',['allnews'=>$allnews,'count'=>$count,'paginate'=>$paginate]);
        }else{
            abort(404);
        }
    }
    public function destroynews($id){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            DB::table("newsletter")->delete($id);
            return response()->json(['success' => "Product Deleted successfully.", 'tr' => 'tr_' . $id]);
        }else{
            abort(404);
        }
    }
    public function deleteAllnews(Request $request){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $ids = $request->ids;
            DB::table("newsletter")->whereIn('id', explode(",", $ids))->delete();
            return response()->json(['success' => "Products Deleted successfully."]);
        }else{
            abort(404);
        }

    }
    public function sendnews(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            return view('admin.sendnews');
        }else{
            abort(404);
        }
    }
    public function sendds(Request $request)
    {
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $res = $request->toArray();
            $content = $res['content'];
            $namelink = $res['namelink'];
            $link = $res['link'];
            $time = Jalalian::forge('now')->format('%B %d، %Y');
            $allemail = newsletter::all()->toArray();
            foreach ($allemail as $item) {
                $email = $item['email'];
                Mail::to($email)->send(new newslettermail($content,$link,$namelink,$time));
            }
            return redirect()->back()->with('success','ایمیل ها ارسال شد');
            }else{
            abort(404);
        }
    }
    public function live(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            return view('admin.live');
        }else{
            abort(404);
        }
        }
    public function headers(){
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $all = header::orderBy('id', 'DESC')->get()->toArray();
            return view('admin.header',['all'=>$all]);
    }else{
        abort(404);
        }
    }
    public function saveheader(Request $request)
    {
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
                $res = $request->toArray();
                $text = $res['text'];
                $link = $res['link'];
                $time = Jalalian::forge('now')->format('%B %d، %Y');
                $desc = $time;
                header::save_all_header($link, $text, $desc);
                return redirect()->back();
            } else {
                abort(404);
            }
        }
    }
        public function headersdelete(Request $request){
            if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                $id = $request->hash;
                $desc = Crypt::decrypt($id);
                $hashhs = new Hashids();
                $hashh = $hashhs->decode($desc);
                foreach ($hashh as $item) {
                    $ids  = $item;
                }
                header::delete_id($ids);
                return redirect()->back();
            }else{
                abort(404);
            }
            }
            public function headersupdate(Request $request){
                if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                    $id = $request->hash;
                    $desc = Crypt::decrypt($id);
                    $hashhs = new Hashids();
                    $hashh = $hashhs->decode($desc);
                    foreach ($hashh as $item) {
                        $ids  = $item;
                    }
                    $all = header::give_id($ids)->toArray();
                    return view('admin.updateheader',['all'=>$all]);
                }else{
                    abort(404);
                }
                }
                public function saveupdatesheader(Request $request){
                    if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                        $id = $request->hash;
                        $res = $request->toArray();
                        $desc = Crypt::decrypt($id);
                        $hashhs = new Hashids();
                        $hashh = $hashhs->decode($desc);
                        foreach ($hashh as $item) {
                            $ids  = $item;
                        }
                        $text = $res['text'];
                        $link = $res['link'];
                        $time = Jalalian::forge('now')->format('%B %d، %Y');
                        header::update_id($ids,$text,$link,$time);
                        return redirect(route('headers'));
                    }else{
                        abort(404);
                    }
                    }
                    public function orders(){
                        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                            $givest1 = afterpayment::give_by_status_1()->toArray();
                            $givest2 = afterpayment::give_by_status_2();
                            $givest3 = afterpayment::give_by_status_3()->toArray();
                            $givest4 = afterpayment::give_by_status_4()->toArray();
                            return view('admin.orders',['st1'=>$givest1,'st2'=>$givest2,'st3'=>$givest3,'st4'=>$givest4]);
                        }else{
                            abort(404);
                        }
                        }
                        public function daryaft(Request $request){
                            if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                                $res = $request->toArray();
                                $id = $res['id'];
                                $status = '2';
                                afterpayment::give_to_daryaft($id,$status);
                                return redirect()->back();
                            }
                            else{

                            }
                            }
                            public function waitf(Request $request){
                                if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {            $res = $request->toArray();
            $id = $res['id'];
            $status = '1';
            afterpayment::give_to_daryaft($id,$status);
            return redirect()->back();
                                }else{
            abort(404);
        }
                            }
                            public function sendt(Request $request){
                                if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                                    $res = $request->toArray();
                                    $id = $res['id'];
                                    $status = '3';
                                    afterpayment::give_to_daryaft($id,$status);
                                    return redirect()->back();
                                }else{
                                    abort(404);
                                }
                                }
                                public function takmill(Request $request){
                                    if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                                        $res = $request->toArray();
                                        $id = $res['id'];
                                        $status = '4';
                                        afterpayment::give_to_daryaft($id,$status);
                                        return redirect()->back();
                                    }else{
                                        abort(404);
                                    }
                                    }
                                    public function hazffs(Request $request){
                                        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {                                            $res = $request->toArray();
                                            $id = $res['id'];
                                            afterpayment::deletebyid($id);
                                            return redirect()->back();
                                        }else{
                                            abort(404);
                                        }
                                        }
public function st1show(Request $request)
{
    if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
        $res = $request->toArray();
        $id = $res['id'];
        $userid = $res['userid'];
        $after = afterpayment::give_idd($id)->toArray();
        $auth = authentic::if_Valid($userid)->toArray();
        foreach ($after as $item) {
            $id = $item['productid'];
            $count = $item['count'];
            $status = $item['status'];
            $time = $item['time'];
            $orderid = $item['orderid'];
            $products = product::getbyid($id)->toArray();
            $allpr[] = ['count' => $count, 'pr' => $products, 'status' => $status, 'time' => $time, 'orderid' => $orderid];
        }
        return view('admin.showst1', ['allpr' => $allpr, 'auth' => $auth]);
    } else {
        abort(404);
    }
}
    public function factorr(Request $request)
    {
        if (Auth::user()->utype === 'ADM' && Auth::user()->id === 1) {
            $all_daryaft = afterpayment::give_by_status_2()->toArray();
            foreach ($all_daryaft as $item) {
                $orderid = $item['orderid'];
                $ord = $item['orderid'];
                $userid = $item['userid'];
                $count = $item['count'];
                $productid = $item['productid'];
                $products = product::getbyid($productid)->toArray();
                $auth = authentic::if_Valid($userid)->toArray();
                $timee = Jalalian::forge('now')->format('%B %d، %Y');
                $alls[] = ['count' => $count, 'orderid' => $ord, 'pro' => $products, 'auth' => $auth, 'time' => $timee, 'userid' => $userid];
            }
            $date = $timee = Jalalian::forge('now')->format('%B %d، %Y');
            return view('factor', ['alls' => $alls, 'date' => $date]);
        } else {
            abort(404);
        }
    }
}
