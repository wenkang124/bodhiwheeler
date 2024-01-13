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
        Schema::create('package_price_lists', function (Blueprint $table) {
            $table->ulid('id')->primary();
            $table->string('type');
            $table->unsignedInteger('min-hours')->nullable();
            $table->decimal('distance', 8, 2)->nullable();
            $table->string('distance_type')->nullable();
            $table->decimal('price', 10, 2)->nullable();
            $table->unsignedInteger('sequence');
            $table->foreignUlid('package_id')->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_price_lists');
    }
};
