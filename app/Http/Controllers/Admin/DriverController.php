<?php

namespace App\Http\Controllers\Admin;

use App\Models\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class DriverController extends Controller
{
    public function index()
    {
        return view('admin.driver.index');
    }

    public function driverQuery(Request $request)
    {
        $result = Driver::query();

        return DataTables::of($result)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('email', function ($row) {
                return $row->email;
            })
            ->editColumn('phone', function ($row) {
                return $row->phone;
            })
            ->editColumn('status', function ($row) {
                $statusColorClass = $row->status == 'active' ? 'text-success' : 'text-danger';
                return '<span class="' . $statusColorClass . '">' . $row->status . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->addColumn('actions', function ($row) {
                $actions = ' <a href="' . route('admin.driver.edit', [$row->id]) . '" class="btn btn-icon btn-sm btn-outline-success">Edit</a>';
                return $actions;
            })
            ->rawColumns(['name', 'email', 'phone', 'status', 'actions'])->make(true);
        return $result;
    }

    public function create()
    {
        return view('admin.driver.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email|unique:drivers,email,NULL,id,deleted_at,NULL',
            'phone' => 'required|string|max:20|regex:/^[0-9]+$/',
            'status' => 'in:active,inactive',

        ]);

        $driver = new Driver;
        $driver->fill($request->all());
        $driver->save();

        Session::flash('alert-success', 'Successfully Created');

        return redirect()->route('admin.driver');
    }

    public function edit(Driver $driver)
    {
        return view('admin.driver.edit', compact('driver'));
    }

    public function update(Request $request, Driver $driver)
    {
        $this->validate($request, [
            'name' => 'required',
            'phone' => 'required|string|max:20|regex:/^[0-9]+$/',
            'status' => 'in:active,inactive',
        ]);

        $driver->fill($request->all());
        $driver->save();

        Session::flash('alert-success', 'Successfully Updated');

        return redirect()->route('admin.driver.edit', $driver);
    }

    public function delete(Driver $driver)
    {
        if ($driver->bookings()->count() > 0) {
            Session::flash('alert-danger', 'Failed to delete. This driver has associated bookings. Please remove the bookings first.');
            return redirect()->back();
        }

        $driver->delete();
        Session::flash('alert-success', 'Successfully Deleted');
        return redirect()->route('admin.driver');
    }
}
