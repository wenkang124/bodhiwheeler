<?php

namespace App\Http\Controllers\Admin;

use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.admin.index');
    }

    public function query()
    {
        $currentUserId = auth()->id();

        $query = Admin::query()->where('id', '!=', $currentUserId);

        $result = DataTables::of($query)->addColumn('actions', function ($row) {
            $actions = '<a href="' . route('admin.admin.edit', [$row->id]) . '" class="btn btn-icon btn-sm btn-outline-success">Edit</a>';
            return $actions;
        })->editColumn('created_at', function ($row) {
            return $row->created_at;
        })->rawColumns(['actions'])->make(true);

        return $result;
    }

    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins',
        ]);

        $admin = new Admin;
        $admin->fill($request->all());

        $password = Str::random(10);

        $admin->password = bcrypt($password);

        // Assign admin role to new admins by default
        $adminRole = \App\Models\AdminRole::where('name', 'admin')->first();
        $admin->admin_role_id = $adminRole->id;

        $admin->save();

        Mail::to($admin->email)->send(new \App\Mail\Admin\AdminAccountCreated($admin, $password));

        Session::flash('alert-success', 'Successfully Created');

        return redirect()->route('admin.admin');
    }

    public function edit(Admin $admin)
    {
        return view('admin.admin.edit', compact('admin'));
    }

    public function update(Request $request, Admin $admin)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:admins,email,' . $admin->id,
        ]);

        $admin->fill($request->all());

        $admin->save();

        Session::flash('alert-success', 'Successfully Updated');

        return redirect()->route('admin.admin.edit', $admin);
    }

    public function delete(Admin $admin)
    {
        $admin->delete();
        Session::flash('alert-success', 'Successfully Deleted');
        return redirect()->route('admin.admin');
    }
}
