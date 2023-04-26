<?php

use App\Models\User;
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
        Schema::create('air_flights', function (Blueprint $table) {
            $table->id();
            // $table->string('air_line_name')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_email')->nullable();
            $table->string('joureny_type')->nullable();
            $table->string('origin_airport')->nullable();
            $table->string('destination_airport')->nullable();
            $table->string('departure_data')->nullable();
            $table->string('returend_data')->nullable();
            $table->string('adults')->nullable();
            $table->string('childes')->nullable();
            $table->string('infants')->nullable();
            $table->string('travel_class')->nullable();
            $table->integer('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('uniqueId')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('air_flights');
    }
};
