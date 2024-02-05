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
            $table->unsignedInteger('adjustment');
            $table->unsignedInteger('value');
            $table->string('adjustment_type')->nullable();
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
