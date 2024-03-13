<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SystemConfig extends Model
{
    use HasFactory, HasUlids;

    protected $fillable = ['type', 'is_active', 'image_path'];
}
