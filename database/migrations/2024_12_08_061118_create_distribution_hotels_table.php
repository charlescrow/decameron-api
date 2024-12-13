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
        Schema::create('distribution_hotels', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('hotel_id');
            $table->unsignedBigInteger('accommodation_room_id');
            $table->unsignedBigInteger('type_room_id');
            $table->integer('number_room');
            $table->timestamps();

            $table->foreign('hotel_id')
            ->references('id')
                ->on('hotels')
                ->onDelete('cascade');

            $table->foreign('accommodation_room_id')
            ->references('id')
                ->on('accommodation_rooms')
                ->onDelete('cascade');

            $table->foreign('type_room_id')
            ->references('id')
                ->on('type_rooms')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distribution_hotels');
    }
};
