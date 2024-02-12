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
        $result = Booking::where('status', 'rejected');

        return DataTables::of($result)
            ->editColumn('name', function ($row) {
                return $row->name;
            })
            ->editColumn('phone', function ($row) {
                return $row->phone;
            })
            ->editColumn('package_name', function ($row) {
                return $row->package_name;
            })
            ->editColumn('status', function ($row) {
                return '<span class="text-danger">' . ucfirst($row->status) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.approved-booking.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100%;">Details</a>';
                $actions .= '</div>';

                return $actions;
            })

            ->rawColumns(['name', 'phone', 'package_name', 'status', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.rejected-booking.detail', compact('booking'));
    }
}
