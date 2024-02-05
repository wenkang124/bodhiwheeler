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
        Schema::create('bookings', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->date('pick_up_date');
            $table->time('pick_up_time');
            $table->time('return_time')->nullable();
            $table->unsignedInteger('no_of_charter_hours')->nullable();
            $table->text('pick_up_address');
            $table->text('drop_off_address');
            $table->unsignedInteger('no_of_passenger');
            $table->unsignedInteger('no_of_wheelchair_pax');
            $table->decimal('total_price', 10, 2)->default(0.00);
            $table->decimal('distance', 8, 2)->default(0.00);
            $table->string('package_name');
            $table->text('remarks')->nullable();
            $table->string('status')->default('new'); // new, submitted, approved, rejected
            $table->foreignUlid('package_id')->constrained();
            $table->foreignUlid('driver_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
