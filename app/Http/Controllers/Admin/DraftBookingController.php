<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class DraftBookingController extends Controller
{
    public function index()
    {
        return view('admin.booking.draft-booking.index');
    }

    public function draftBookingQuery(Request $request)
    {
        $result = Booking::where('status', 'pending');

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
            ->editColumn('total_price', function ($row) {
                return '$' . $row->total_price;
            })
            ->editColumn('status', function ($row) {
                return '<span class="text-secondary">' . ucfirst($row->status) . '</span>';
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
                $actions .= '<a href="' . route('admin.booking.draft-booking.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100px;">Details</a>';
                $actions .= '</div>';

                return $actions;
            })

            ->rawColumns(['name', 'phone', 'package_name', 'status', 'details', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.draft-booking.detail', compact('booking'));
    }

}
