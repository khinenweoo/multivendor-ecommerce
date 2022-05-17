<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->bigIncrements('order_id');
            $table->string('order_number')->unique();
            $table->bigInteger('user_id')->unsigned();
            $table->integer('item_count')->nullable()->default(0);
            $table->float('subtotal');
            $table->float('discount')->default(0);
            $table->float('tax')->default(0);
            $table->float('grand_total');
            $table->string('name');
            $table->string('last_name')->nullable();
            $table->string('email');
            $table->string('phone');
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('postcode')->nullable();
            $table->string('address1');
            $table->string('address2')->nullable();
            $table->string('order_note')->nullable();
            $table->string('vendor_email')->nullable();

            $table->enum('order_status', ['pending','confirmed','processing','delivered','completed','canceled'])->default('pending');
            $table->boolean('is_paid')->default(false);
            $table->boolean('is_shipping_different')->default(false);
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
