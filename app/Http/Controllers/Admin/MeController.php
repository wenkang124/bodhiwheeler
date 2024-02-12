<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Password;

class MeController extends Controller
{
    public function edit()
    {
        return view('admin.me.edit');
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $user->id,
        ]);

        $user->fill($request->all());

        $user->save();

        Session::flash('alert-success', 'Successfully updated');

        return redirect()->route('admin.me.edit');
    }

    public function editPassword()
    {
        return view('admin.me.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $user = Auth::user();

        $this->validate($request, [
            'password' => 'current_password',
            'new_password' => ['required', 'confirmed', Password::min(8)],
        ]);

        $user->password = bcrypt($request->get('new_password'));
        $user->save();

        Session::flash('alert-success', 'Successfully updated');

        return redirect()->route('admin.me.edit-password');
    }
}
