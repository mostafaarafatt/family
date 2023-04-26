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
    public function up()
    {
        Schema::table('air_flights', function (Blueprint $table) {
            $table->string('marketingAirlineName')->nullable();
            $table->string('journeyDuration')->nullable();
            $table->string('flightNumber')->nullable();
            $table->string('totalStops')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('air_flights', function (Blueprint $table) {
            //
        });
    }
};
