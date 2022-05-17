<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('phone')->nullable();
            $table->string('profile_photo')->nullable()->default('avatar.png');
            $table->date('birth_date')->nullable()->default(null);
            $table->enum('gender', ['male','female'])->nullable()->default(null);
            $table->enum('classifications', ['standard','silver','gold'])->default('standard')->nullable();
            $table->text('about')->nullable()->default(null);
            $table->boolean('approved')->default(1);

            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address1')->nullable();
            $table->string('address2')->nullable();

            // $table->string('shipping_country')->nullable();
            // $table->string('shipping_state')->nullable();
            // $table->string('shipping_city')->nullable();
            // $table->string('shipping_postcode')->nullable();
            // $table->string('shipping_address')->nullable();

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
}
