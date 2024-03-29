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
                $details = '<td>';
                $details .= '<strong>Pick-up Address:</strong> ' . $row->pick_up_address . '<br>';
                $details .= '<strong>Drop Off Address:</strong> ' . $row->drop_off_address . '<br>';
                $details .= '<strong>Pick-up Time:</strong> ' . $row->pick_up_time . '<br>';
                $details .= '<strong>Driver Name:</strong> ' . $row->driver->name;
                $details .= '</td>';
                return $details;
            })
            ->addColumn('details', function ($row) {
                return '<span class="text-success">' . ucfirst($row->status) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.approved-booking.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100px;">Details</a>';
                $actions .= '</div>';

                return $actions;
            })

            ->rawColumns(['name', 'phone', 'package_name', 'details', 'status', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.approved-booking.detail', compact('booking'));
    }

}
