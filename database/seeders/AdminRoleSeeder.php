<?php

namespace Database\Seeders;

use App\Models\AdminRole;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Super Admin Role - Full access
        AdminRole::create([
            'name' => 'super_admin',
            'permissions' => [
                'view_dashboard',
                'manage_admins',
                'manage_drivers',
                'manage_bookings',
                'manage_system_config',
                'view_all_reports',
                'view_bookings',
                'create_bookings',
                'edit_bookings',
                'view_draft_bookings',
                'view_pending_bookings',
                'view_approved_bookings',
                'view_rejected_bookings',
            ],
            'notify_request_review_task' => true,
            'notify_mark_actual_complete_task' => true,
            'notify_payment_receipt_approval' => true,
        ]);

        // Admin Role - Limited to booking operations
        AdminRole::create([
            'name' => 'admin',
            'permissions' => [
                'view_bookings',
                'create_bookings',
                'edit_bookings',
                'view_draft_bookings',
                'view_pending_bookings',
                'view_approved_bookings',
                'view_rejected_bookings',
            ],
            'notify_request_review_task' => false,
            'notify_mark_actual_complete_task' => false,
            'notify_payment_receipt_approval' => false,
        ]);
    }
}
