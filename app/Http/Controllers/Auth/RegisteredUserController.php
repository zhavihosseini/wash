<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Sadegh19b\LaravelPersianValidation\PersianValidators;
class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $irmobiile = ['iran_mobile'];
        $request->validate([
            'name' => 'required|string|max:255|persian_alpha',
/*            'username'=>'required|string|max:255|alpha_dash|unique:users|regex:/^[a-zA-Z]+$/u',*/
            'phone' => 'required|string|ir_mobile|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'g-recaptcha-response'=>'required',
        ]);

        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
            'g-recaptcha-response'=>$request->captcha,
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
