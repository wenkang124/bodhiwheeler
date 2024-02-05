<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BookingAdjustment extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'type',
        'adjustment',
        'value',
        'adjustment_type',
        'total',
        'package_id',
        'booking_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

}
