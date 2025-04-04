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
        Schema::create('equipments_service_bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('chat_id');
            $table->timestamp('booking_date');
            $table->timestamps();
            $table->foreign('chat_id')->references('id')->on('telegraph_chats')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('equipments_service_bookings');
    }
};
