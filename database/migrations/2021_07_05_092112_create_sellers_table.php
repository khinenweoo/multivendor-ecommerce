<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sellers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('username')->nullable();
            $table->string('role');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('nrc_number');
            $table->string('nrc_front')->default(null);
            $table->string('nrc_back')->default(null);
            $table->integer('mobile')->nullable();
            $table->integer('viber_no')->nullable();
            $table->string('profile_photo')->nullable()->default('avatar.png');
            $table->string('address')->nullable();
            $table->text('about')->nullable()->default(null);
            $table->boolean('approved')->default(0);


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
        Schema::dropIfExists('sellers');
    }
}
