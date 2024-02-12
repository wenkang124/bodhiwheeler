<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $salesData = [
            'daily' => $this->getSales('daily'),
            'weekly' => $this->getSales('weekly'),
            'monthly' => $this->getSales('monthly'),
            'yearly' => $this->getSales('yearly'),
        ];

        $allBookings = Booking::where('status', 'approved')
            ->whereDate('created_at', '>=', now()->toDateString())
            ->take(8)
            ->get();

        return view('admin.dashboard', compact('salesData', 'allBookings'));
    }

    private function getSales($interval)
    {
        $today = now()->toDateString();

        switch ($interval) {
            case 'daily':
                $dailyData = Booking::where('status', 'approved')
                    ->whereDate('created_at', $today)
                    ->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $dailyData;
                break;
            case 'weekly':
                $weeklyData = Booking::where('status', 'approved')
                    ->whereBetween('created_at', [now()->startOfWeek(), now()->endOfWeek()])
                    ->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $weeklyData;
                break;
            case 'monthly':
                $monthlyData = Booking::where('status', 'approved')
                    ->whereYear('created_at', now()->year)
                    ->whereMonth('created_at', now()->month)
                    ->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $monthlyData;
                break;
            case 'yearly':
                $yearlyData = Booking::where('status', 'approved')
                    ->whereYear('created_at', now()->year)
                    ->select(DB::raw('sum(total_price) as total_sales'), DB::raw('count(*) as booking_count'))
                    ->first();
                return $yearlyData;
                break;
            default:
                return null;
        }
    }
}
