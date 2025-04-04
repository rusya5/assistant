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
        Schema::create('booked_equipments_services', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('equipments_service_id');
            $table->unsignedBigInteger('booking_id');
            $table->timestamps();

            $table->foreign('equipments_service_id')->references('id')->on('equipments_services')->onDelete('cascade');
            $table->foreign('booking_id')->references('id')->on('equipments_service_bookings')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('booked_equipments_services');
    }
};
