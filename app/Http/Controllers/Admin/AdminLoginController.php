<?php

namespace App\Http\Controllers\Admin;

use App\Events\Admin\AdminLogin;
use App\Events\Admin\AdminLogout;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:admin')->except('logout');
    }

    public function login(Request $request)
    {
        if ($request->isMethod('POST')) {

            $validateDate = $request->validate([
                'email' => 'required|email|max:255',
                'password' => 'required'
            ], trans('auth'));

            $remember = $request->has('remember_me');

            $auth = Auth::guard('admin')->attempt([
                'email' => $validateDate['email'],
                'password' => $validateDate['password']
            ], $remember);

            if ($auth) {
                //event to reset active property
                event(new AdminLogin(auth('admin')->user()));

                return redirect()->intended('/admin');
            }

            return back()->withErrors(trans('auth.failed'));

        }

        return view('backend.login');

    }

    public function logout()
    {
        //event to reset active property
        event(new AdminLogout(auth('admin')->user()));

        Auth::guard('admin')->logout();
        return redirect()->route('admin.login');
    }


}
