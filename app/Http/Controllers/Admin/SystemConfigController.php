<?php

namespace App\Http\Controllers\Admin;

use App\Models\SystemConfig;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class SystemConfigController extends Controller
{
    public function index()
    {
        $systemConfig = SystemConfig::first();

        return view('admin.system-config.index', compact('systemConfig'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'is_active' => '|boolean',
            'image_path' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $systemConfig = SystemConfig::first();

        $data = [
            'is_active' => $request->input('is_active', false),
        ];

        if ($request->hasFile('image_path')) {
            $data['image_path'] = $request->file('image_path')->store('payment_qr', 'public');
        }

        $systemConfig->update($data);

        Session::flash('alert-success', 'System Config status updated successfully.');

        return redirect()->route('admin.system-config');
    }
}
