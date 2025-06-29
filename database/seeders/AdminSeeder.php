<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $superAdminRole = AdminRole::where('name', 'super_admin')->first();

        Admin::create([
            'name' => 'Admin',
            'email' => 'bodhiwheelers@gmail.com',
            'password' => Hash::make('password'),
            'admin_role_id' => $superAdminRole->id,
        ]);
    }
}
