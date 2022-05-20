<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\VerifyEmailController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/email/verify/{id}/{hash}', [VerifyEmailController::class, '__invoke'])
    ->middleware(['signed', 'throttle:6,1'])
    ->name('verification.verify');
Route::get('phone-auth', [\App\Http\Controllers\IndexController::class, 'phone'])->name('phone');
Route::get('/',[\App\Http\Controllers\IndexController::class,'index'])->name('index');
Route::get('header',[\App\Http\Controllers\IndexController::class,'header'])->name('header');
Route::get('/dashboard',[\App\Http\Controllers\IndexController::class,'dashboard'])->middleware(['admin','auth','verified','verifiedphone'])->name('dashboard');
Route::get('/ticket',[\App\Http\Controllers\IndexController::class,'tickett'])->middleware('auth','verified')->name('tickett');
Route::post('/ticket/send',[\App\Http\Controllers\IndexController::class,'sendticket'])->middleware('auth','verified')->name('sendticket');
Route::post('/shopping/save',[\App\Http\Controllers\IndexController::class,'saveshopp'])->middleware('auth','verified')->name('saveshopp');
Route::get('/my/shoppingcart',[\App\Http\Controllers\IndexController::class,'myshoppingcart'])->middleware('auth','verified')->name('myshoppingcart');
Route::post('/save/count/shoppingcart',[\App\Http\Controllers\IndexController::class,'savecount'])->middleware('auth','verified')->name('savecount');
Route::post('/deletd/shoppingcart',[\App\Http\Controllers\IndexController::class,'delteshoppingcart'])->middleware('auth','verified')->name('delteshoppingcart');
Route::get('/dashboard/auth',[\App\Http\Controllers\IndexController::class,'authenticc'])->middleware('auth','verified')->name('authenticc');
Route::post('/dashboard/auth/save',[\App\Http\Controllers\IndexController::class,'authenticsave'])->middleware('auth','verified')->name('authenticsave');
Route::post('/newsletter',[\App\Http\Controllers\IndexController::class,'newsletter'])->name('newsletter');
Route::get('/ticket/show/ticket/{hash}',[\App\Http\Controllers\IndexController::class,'showticket'])->middleware('auth','verified')->name('showticket');
Route::get('/payment',[\App\Http\Controllers\IndexController::class,'payment'])->middleware('auth','verified')->name('payment');
Route::get('/callback/payment',[\App\Http\Controllers\IndexController::class,'callback'])->middleware('auth','verified')->name('callback');
Route::get('newview',function(){
    return view('newview');
});
Route::get('/FAQ',[\App\Http\Controllers\IndexController::class,'faq'])->name('faq');


Route::get('login/sms',[\App\Http\Controllers\SmsController::class,'loginsms'])->middleware('sms')->name('loginsms');
Route::post('login/sms/check/user',[\App\Http\Controllers\SmsController::class,'checkusers'])->middleware('sms')->name('checkusers');
Route::get('login/via/sms/code',[\App\Http\Controllers\SmsController::class,'smscode'])->middleware('sms')->name('smscode');
Route::post('login/check/codes',[\App\Http\Controllers\SmsController::class,'checkscode'])->middleware('sms')->name('checkscode');
Route::post('login/check/resend/code',[\App\Http\Controllers\SmsController::class,'resendcode'])->middleware('sms')->name('resendcode');

Route::get('/verifyphone',[\App\Http\Controllers\SmsController::class,'verifyphone'])->name('verifyphone');
Route::post('/sendverify',[\App\Http\Controllers\SmsController::class,'sendverify'])->middleware('checkverify')->name('sendverify');
Route::get('verify/code/sms',[\App\Http\Controllers\SmsController::class,'verifycodesms'])->middleware('checkverify')->name('verifycodesms');
Route::post('verify/submit/check',[\App\Http\Controllers\SmsController::class,'verifysubmit'])->middleware('checkverify')->name('verifysubmit');
Route::post('verify/resend/code',[\App\Http\Controllers\SmsController::class,'resendverify'])->middleware('checkverify')->name('resendverify');
Route::get('user/change/phone',[\App\Http\Controllers\SmsController::class,'changephones'])->middleware('checkverify')->name('changephones');
Route::post('user/change/save/phone',[\App\Http\Controllers\SmsController::class,'savechangephones'])->middleware('checkverify')->name('savechangephones');
/*Route::get('/iii',[\App\Http\Controllers\IndexController::class,'iii'])->name('iii');*/
/*Route::get('/admin',function (){
    if (\Illuminate\Support\Facades\Auth::user()->utype==='ADM' && \Illuminate\Support\Facades\Auth::user()->username==='AdMin') {
        return view('admin.admin');
    }else{
        abort(404);
    }
})->middleware(['admin','auth'])->name('admin');*/
Route::get('/admin',[\App\Http\Controllers\AdminController::class,'admin'])->middleware('admin')->name('admin');
Route::get('/admin/doc',[\App\Http\Controllers\AdminController::class,'doc'])->middleware('admin')->name('doc');
Route::post('/admin/doc/save',[\App\Http\Controllers\AdminController::class,'save'])->middleware('admin')->name('save');
Route::get('/admin/doc/delete/{hash}',[\App\Http\Controllers\AdminController::class,'delete'])->middleware('admin')->name('delete');
Route::post('/admin/user/edit/{hash}',[\App\Http\Controllers\AdminController::class,'edit'])->middleware('admin')->name('edit');
Route::get('/admin/user/edit/sub/{hash}',[\App\Http\Controllers\AdminController::class,'editus'])->middleware('admin')->name('editus');
Route::get('/admin/product',[\App\Http\Controllers\AdminController::class,'product'])->middleware('admin')->name('product');
Route::post('/admin/saveproduct',[\App\Http\Controllers\AdminController::class,'saveproduct'])->middleware('admin')->name('saveproduct');
Route::post('/admin/delete/product/{hash}',[\App\Http\Controllers\AdminController::class,'deleteproduct'])->middleware('admin')->name('deleteproduct');
Route::get('/admin/updateproduct/{hash}',[\App\Http\Controllers\AdminController::class,'updateproduct'])->middleware('admin')->name('updateproduct');
Route::post('/admin/updateproduct/save',[\App\Http\Controllers\AdminController::class,'savepro'])->middleware('admin')->name('savepro');
Route::get('/admin/ticket',[\App\Http\Controllers\AdminController::class,'ticket'])->middleware('admin')->name('ticket');
Route::delete('myproductticket/{id}', [\App\Http\Controllers\AdminController::class,'destroyticket'])->middleware('admin');
Route::delete('myproductDeleteticke', [\App\Http\Controllers\AdminController::class,'deleteAllticket'])->middleware('admin');
Route::post('/admin/closed/ticket',[\App\Http\Controllers\AdminController::class,'closedticket'])->middleware('admin')->name('closedticket');
Route::get('admin/reply/ticket',[\App\Http\Controllers\AdminController::class,'reply'])->middleware('admin')->name('reply');
Route::post('admin/reply/ticket/save/{ticket}',[\App\Http\Controllers\AdminController::class,'savereply'])->middleware('admin')->name('savereply');
Route::get('admin/reply/all',[\App\Http\Controllers\AdminController::class,'allrep'])->middleware('admin')->name('allrep');
Route::delete('myproductrep/{id}', [\App\Http\Controllers\AdminController::class,'destroyrep'])->middleware('admin');
Route::delete('myproductDeleterep', [\App\Http\Controllers\AdminController::class,'deleteAllrep'])->middleware('admin');
Route::get('/admin/view/reply',[\App\Http\Controllers\AdminController::class,'viewrep'])->middleware('admin')->name('viewrep');
Route::get('/admin/all/authentic',[\App\Http\Controllers\AdminController::class,'authentic'])->middleware('admin')->name('authentic');
Route::delete('myproductauth/{id}', [\App\Http\Controllers\AdminController::class,'destroyauth'])->middleware('admin');
Route::delete('myproductDeleteauth', [\App\Http\Controllers\AdminController::class,'deleteAllauth'])->middleware('admin');
Route::post('admin/authentic/taiidshod/',[\App\Http\Controllers\AdminController::class,'taiidshod'])->middleware('admin')->name('taiidshod');
Route::post('admin/authentic/taiidnashod',[\App\Http\Controllers\AdminController::class,'taiidnashod'])->middleware('admin')->name('taiidnashod');
Route::delete('myproductnews/{id}', [\App\Http\Controllers\AdminController::class,'destroynews'])->middleware('admin');
Route::delete('myproductDeletenews', [\App\Http\Controllers\AdminController::class,'deleteAllnews'])->middleware('admin');
Route::get('/admin/all/newsletter',[\App\Http\Controllers\AdminController::class,'newsletterr'])->middleware('admin')->name('newsletterr');
Route::get('/admin/send/newsletter',[\App\Http\Controllers\AdminController::class,'sendnews'])->middleware('admin')->name('sendnews');
Route::post('/admin/send/news/to/all',[\App\Http\Controllers\AdminController::class,'sendds'])->middleware('admin')->name('sendds');
Route::get('/admin/header',[\App\Http\Controllers\AdminController::class,'headers'])->middleware('admin')->name('headers');
Route::post('/admin/header/save',[\App\Http\Controllers\AdminController::class,'saveheader'])->middleware('admin')->name('saveheader');
Route::post('/admin/headers/delete/{hash}',[\App\Http\Controllers\AdminController::class,'headersdelete'])->middleware('admin')->name('headersdelete');
Route::get('/admin/headers/update/{hash}',[\App\Http\Controllers\AdminController::class,'headersupdate'])->middleware('admin')->name('headersupdate');
Route::post('/admin/header/save/update/{hash}',[\App\Http\Controllers\AdminController::class,'saveupdatesheader'])->middleware('admin')->name('saveupdatesheader');
Route::get('/admin/orders/',[\App\Http\Controllers\AdminController::class,'orders'])->middleware('admin')->name('orders');
Route::post('/admin/orders/st1/daryaft',[\App\Http\Controllers\AdminController::class,'daryaft'])->middleware('admin')->name('daryaft');
Route::post('/admin/orders/st2/waitf',[\App\Http\Controllers\AdminController::class,'waitf'])->middleware('admin')->name('waitf');
Route::post('/admin/order/st3/sendt',[\App\Http\Controllers\AdminController::class,'sendt'])->middleware('admin')->name('sendt');
Route::post('/admin/order/st3/takmill',[\App\Http\Controllers\AdminController::class,'takmill'])->middleware('admin')->name('takmill');
Route::post('/admin/order/st4/hazffs',[\App\Http\Controllers\AdminController::class,'hazffs'])->middleware('admin')->name('hazffs');
Route::get('/admin/order/st1/show',[\App\Http\Controllers\AdminController::class,'st1show'])->middleware('admin')->name('st1show');
Route::get('/admin/order/factor',[\App\Http\Controllers\AdminController::class,'factorr'])->middleware('admin')->name('factorr');
require __DIR__.'/auth.php';
