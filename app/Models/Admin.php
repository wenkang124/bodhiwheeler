<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, HasUlids;

    protected $fillable = ['name', 'email'];

    protected $hidden = [
        'password',
        'remember_token',
    ];

}
