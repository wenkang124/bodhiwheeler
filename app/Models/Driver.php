<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Driver extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = ['name', 'email', 'phone', 'status'];

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
