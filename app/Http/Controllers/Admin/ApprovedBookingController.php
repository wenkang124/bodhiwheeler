<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class ApprovedBookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.approved-booking.index');
    }

    public function approvedBookingQuery(Request $request)
    {
        $result = Booking::where('status', 'approved');

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
                return '<span class="text-success">' . ucfirst($row->status) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.approved-booking.detail', [$row->id, $row]) . '" class="btn btn-outline-info" target="_blank">Details</a>';
                $actions .= '</div>';

                return $actions;
            })
            ->rawColumns(['name', 'phone', 'package_name', 'status', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.approved-booking.detail', compact('booking'));
    }

}
