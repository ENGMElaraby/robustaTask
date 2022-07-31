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
        Schema::create('routes', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('bus_id', false, true);
            $table->foreign('bus_id')->references('id')->on('buses');
            $table->bigInteger('from_city', false, true)->comment('City id of form point');
            $table->foreign('from_city')->references('id')->on('cities');
            $table->bigInteger('to_city', false, true)->comment('City id of end point');
            $table->foreign('to_city')->references('id')->on('cities');
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
        Schema::dropIfExists('routes');
    }
};
