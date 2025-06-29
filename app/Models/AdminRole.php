<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class AdminRole extends Model
{
    use HasFactory, HasUlids, SoftDeletes;

    protected $fillable = [
        'name',
        'permissions',
        'notify_request_review_task',
        'notify_mark_actual_complete_task',
        'notify_payment_receipt_approval',
    ];

    protected $casts = [
        'permissions' => 'array',
        'notify_request_review_task' => 'boolean',
        'notify_mark_actual_complete_task' => 'boolean',
        'notify_payment_receipt_approval' => 'boolean',
    ];

    public function admins()
    {
        return $this->hasMany(Admin::class);
    }

    public function hasPermission($permission)
    {
        return in_array($permission, $this->permissions ?? []);
    }
}
