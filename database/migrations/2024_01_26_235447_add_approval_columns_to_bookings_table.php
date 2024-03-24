<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreignUlid('approved_by')->after('driver_id')->nullable()->constrained('admins');
            $table->timestamp('approved_at')->after('approved_by')->nullable();
            $table->boolean('medical_escort')->after('approved_at')->nullable();
            $table->boolean('is_estimated_return_time')->after('return_time')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            //
        });
    }
};
