<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'pick_up_date',
        'pick_up_time',
        'return_time',
        'is_estimated_return_time',
        'no_of_charter_hours',
        'pick_up_address',
        'drop_off_address',
        'no_of_passenger',
        'no_of_wheelchair_pax',
        'total_price',
        'distance',
        'package_name',
        'remarks',
        'status',
        'medical_escort',
        'package_id',
        'driver_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function driver()
    {
        return $this->belongsTo(Driver::class);
    }

    public function approvedBy()
    {
        return $this->belongsTo(Admin::class, 'approved_by');
    }

    public function bookingAdjustments()
    {
        return $this->hasMany(BookingAdjustment::class);
    }

    public function scopeIsPendingReview($query)
    {
        $query->where('status', 'submitted');
    }

    public function scopeIsDraft($query)
    {
        $query->where('status', 'pending');
    }
}
