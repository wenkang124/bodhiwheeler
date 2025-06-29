<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $currentAdmin = auth('admin')->user();

        $salesData = [
            'daily' => $this->getSales('daily'),
            'weekly' => $this->getSales('weekly'),
            'monthly' => $this->getSales('monthly'),
            'yearly' => $this->getSales('yearly'),
        ];

        $latestApprovedBookingsQuery = Booking::where('status', 'approved');

        // If not super admin, only show bookings created by this admin
        if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
            $latestApprovedBookingsQuery->where('created_by_admin', $currentAdmin->id);
        }

        $latestApprovedBookings = $latestApprovedBookingsQuery
            ->orderBy('created_at', 'desc')
            ->take(8)
            ->get();

        return view('admin.dashboard', compact('salesData', 'latestApprovedBookings'));
    }

    private function getSales($interval)
    {
        $currentAdmin = auth('admin')->user();
        $today = now()->toDateString();

        switch ($interval) {
            case 'daily':
                $query = Booking::where('status', 'approved')
                    ->whereDate('created_at', $today);

                // If not super admin, only count bookings created by this admin
                if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
                    $query->where('created_by_admin', $currentAdmin->id);
                }

                $dailyData = $query->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $dailyData;
                break;
            case 'weekly':
                $query = Booking::where('status', 'approved')
                    ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()]);

                // If not super admin, only count bookings created by this admin
                if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
                    $query->where('created_by_admin', $currentAdmin->id);
                }

                $weeklyData = $query->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $weeklyData;
                break;
            case 'monthly':
                $query = Booking::where('status', 'approved')
                    ->whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month);

                // If not super admin, only count bookings created by this admin
                if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
                    $query->where('created_by_admin', $currentAdmin->id);
                }

                $monthlyData = $query->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $monthlyData;
                break;
            case 'yearly':
                $query = Booking::where('status', 'approved')
                    ->whereYear('created_at', now()->year);

                // If not super admin, only count bookings created by this admin
                if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
                    $query->where('created_by_admin', $currentAdmin->id);
                }

                $yearlyData = $query->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $yearlyData;
                break;
            default:
                return null;
        }
    }
}
