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
        Schema::create('bus_seats', static function (Blueprint $table) {
            $table->id();
            $table->bigInteger('route_id', false, true);
            $table->foreign('route_id')->references('id')->on('routes');
            $table->boolean('available')->default(0);
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
        Schema::dropIfExists('bus_seats');
    }
};
