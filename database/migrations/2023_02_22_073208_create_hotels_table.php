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
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('hotel_name')->nullable();
            $table->string('hotel_image')->nullable();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('user_email')->nullable();
            $table->string('country')->nullable();
            $table->string('city')->nullable();
            $table->string('hotel_rate')->nullable();
            $table->string('adult_number')->nullable();
            $table->string('child_number')->nullable();
            $table->string('check_in_data')->nullable();
            $table->string('check_out_data')->nullable();
            $table->string('stay_duration')->nullable();
            $table->string('price')->nullable();
            $table->string('currency')->nullable();
            $table->string('supplierConfirmationNum')->nullable();
            $table->string('referenceNum')->nullable();
            $table->string('payment_method')->nullable();
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
        Schema::dropIfExists('hotels');
    }
};
