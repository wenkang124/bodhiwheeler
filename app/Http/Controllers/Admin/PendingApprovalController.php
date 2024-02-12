<?php

namespace App\Http\Controllers\Admin;

use Form;
use App\Models\Booking;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Illuminate\Support\Facades\Session;

class PendingApprovalController extends Controller
{
    public function index()
    {
        return view('admin.booking.pending-approval.index');
    }

    public function pendingReviewQuery(Request $request)
    {
        $result = Booking::where('status', 'submitted');

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
                return '<span class="text-info">' . ucfirst($row->status) . '</span>';
            })
            ->editColumn('created_at', function ($row) {
                return $row->created_at;
            })
            ->editColumn('actions', function ($row) {
                $actions = '<div class="d-flex flex-column gap-3">';
                $actions .= '<a href="' . route('admin.booking.pending-approval.detail', [$row->id, $row]) . '" class="btn btn-outline-info" style="width: 100%;">Details</a>';

                $actions .= Form::open(['route' => ['admin.booking.pending-approval.update-status', [$row->id, $row]]]);
                $actions .= '<input type="hidden" name="redirect" value="admin.me.task.payment-approval">';
                $actions .= '<button onclick="return confirm(\'Confirm Approve?\')" class="btn btn-outline-success" name="status" value="approved" style="width: 100%;">
                                <i class="fas fa-check"></i>
                                Approve
                            </button>';
                $actions .= Form::close();

                $actions .= Form::open(['route' => ['admin.booking.pending-approval.update-status', [$row->id, $row]]]);
                $actions .= '<input type="hidden" name="redirect" value="admin.me.task.payment-approval">';
                $actions .= '<button onclick="return confirm(\'Confirm Reject?\')" class="btn btn-outline-danger" name="status" value="rejected" style="width: 100%;">
                                <i class="fas fa-times"></i>
                                Reject
                            </button>';
                $actions .= Form::close();
                $actions .= '</div>';

                return $actions;
            })
            ->rawColumns(['name', 'phone', 'package_name', 'status', 'created_at', 'actions'])->make(true);
        return $result;
    }

    public function detail(Booking $booking)
    {
        return view('admin.booking.pending-approval.detail', compact('booking'));
    }

    public function updateStatus(Request $request, Booking $booking)
    {
        $this->validate($request, [
            'status' => 'required|in:approved,rejected'
        ]);

        if ($request->get('status') === 'approved' && !$booking->driver_id) {
            Session::flash('alert-danger', 'Please assign a driver before approving the booking.');
            return redirect()->route('admin.booking.pending-approval');
        }

        $booking->status = $request->get('status');
        $booking->approved_at = now();
        $booking->approvedBy()->associate(auth()->user());
        $booking->save();

        Session::flash('alert-success', 'Successfully Updated');
        return redirect()->route('admin.booking.pending-approval');
    }
}
