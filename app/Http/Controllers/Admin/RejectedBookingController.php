<?php

namespace App\Http\Controllers\Admin;

use Form;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class RejectedBookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.rejected-booking.index');
    }

    public function rejectedBookingQuery(Request $request)
    {
        $currentAdmin = auth('admin')->user();

        $query = Booking::where('status', 'rejected');

        if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
            $query->where('created_by_admin', $currentAdmin->id);
        }

        $result = $query;

        return DataTables::of($result)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('email', function ($row) {
                return $row->email ?? 'N/A';
            })
            ->editColumn('phone', function ($row) {
                return $row->phone;
            })
            ->editColumn('package_name', function ($row) {
                return $row->package_name;
            })
            ->editColumn('total_price', function ($row) {
                return '$' . $row->total_price;
            })
            ->editColumn('status', function ($row) {
                return '<span class="text-danger">' . ucfirst($row->status) . '</span>';
            })
            ->addColumn('details', function ($row) {
                $details = '<td>';
                $details .= '<strong>Pick-up Address:</strong> ' . $row->pick_up_address . '<br>';
                $details .= '<strong>Drop Off Address:</strong> ' . $row->drop_off_address . '<br>';
                $details .= '<strong>Pick-up Time:</strong> ' . $row->pick_up_time . '<br>';
                $details .= '</td>';
                return $details;
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.rejected-booking.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100%;">Details</a>';
                $actions .= '</div>';

                return $actions;
            })

            ->rawColumns(['name', 'email', 'phone', 'package_name', 'status', 'details', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        $currentAdmin = auth('admin')->user();

        // Check if admin has access to this booking
        if ($currentAdmin->role && $currentAdmin->role->name !== 'super_admin') {
            if ($booking->created_by_admin !== $currentAdmin->id) {
                abort(403, 'You do not have permission to view this booking.');
            }
        }

        $booking->load('createdByAdmin', 'approvedBy', 'driver', 'package');
        return view('admin.booking.rejected-booking.detail', compact('booking'));
    }
}
