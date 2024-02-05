<?php

namespace App\Http\Controllers\Admin\Auth;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Admin\Controller;

class LoginController extends Controller
{
    public function __invoke()
    {
        return view('admin.auth.login');
    }

    public function authenticate(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => ['required','exists:admins,email'],
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withInput()->withErrors(['auth' => 'Please fill in required fields']);
        } else {

            $credentials = ['email'=>$request->email, 'password'=>$request->password];
            if (Auth::attempt($credentials)) {
                return redirect()->intended(route('admin'));
            } else {
                return redirect()->back()->withInput()->withErrors(['auth' => 'Incorrect Email or Password']);
            }
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }
}
