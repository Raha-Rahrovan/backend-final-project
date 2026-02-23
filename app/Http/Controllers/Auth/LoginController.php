<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginPostRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $withoutHeader = true;
        $withoutFooter = true;
        $title = 'ورود';

        return view('auth.login', compact('withoutHeader', 'withoutFooter' , 'title'));
    }

    public function post(LoginPostRequest $request)
    {

        $user = User::query()
            ->whereMobile($request->input('mobile'))
            ->first();

        if (!Hash::check($request->input('password'), $user->password)) {

            return back()->withErrors([
                'password' => 'رمز عبور نادرست است لطفا مجدد امتحان کنید.'
            ])->withInput();
        }

        Auth::login($user);
        return redirect()->route('index');

    }
}
