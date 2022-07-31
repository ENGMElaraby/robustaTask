<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up(): void
    {
        Schema::create('booking', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id', false, true);
            $table->foreign('user_id')->references('id')->on('users');
            $table->bigInteger('seat_id', false, true);
            $table->foreign('seat_id')->references('id')->on('bus_seats');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down(): void
    {
        Schema::dropIfExists('booking');
    }
};
