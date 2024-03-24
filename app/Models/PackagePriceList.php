<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PackagePriceList extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = [
        'type',
        'description',
        'adjustment',
        'value',
        'adjustment_type',
        'start_time',
        'end_time',
        'package_id',
    ];

    public function package()
    {
        return $this->belongsTo(Package::class);
    }

}
