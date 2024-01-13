<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'pick_up_date',
        'pick_up_time',
        'return_time',
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
        'package_id',
        'driver_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }
}
