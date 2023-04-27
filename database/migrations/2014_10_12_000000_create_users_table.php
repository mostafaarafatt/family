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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone')->unique()->nullable();
            $table->string('phone_country')->nullable();
            $table->string('email')->nullable();
            $table->enum('is_active', [0, 1])->default(1);
            $table->enum('is_checked', [0, 1])->default(0);
            $table->enum('user_type', ['normal', 'influent'])->default('normal');
            $table->string('influent_name')->nullable();
            $table->string('influent_phone')->nullable();
            $table->string('influent_email')->nullable();
            $table->string('password');

            $table->string('gender')->nullable();
            $table->integer('otpCode')->nullable();
            $table->string('address')->nullable();
            $table->string('nickName')->nullable();
            $table->string('dateOfBirth')->nullable();
            $table->string('nationality')->nullable();
            $table->enum('is_completed', [0, 1])->default(0);
            

            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
