<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShopsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shops', function (Blueprint $table) {
            $table->bigIncrements('shop_id');
            $table->string('shop_name');
            $table->string('shop_slug')->unique()->nullable()->default(null);

            $table->unsignedBigInteger('seller_id')->nullable()->unique();
            $table->foreign('seller_id')->references('id')
            ->on('sellers')->onUpdate('cascade')->onDelete('cascade');
           
            
            //business info
            $table->string('company_name')->nullable();
            $table->enum('account_type', ['business','individual'])->default('business');
            $table->text('main_categories')->nullable()->default(null);
            $table->string('other_category')->nullable();
            $table->string('business_register_no')->nullable();
            $table->string('business_register_form')->nullable()->default(null);
            $table->string('licence_certi_file')->nullable()->default(null);
            $table->text('business_address')->nullable();
            $table->text('pickup_address')->nullable();
            $table->string('website_url')->nullable();
            $table->string('business_email')->unique();
            $table->string('logo_image')->nullable()->default(null);
            $table->string('banner')->nullable()->default(null);

            $table->text('description')->nullable();
            $table->float('rating')->nullable();
            $table->boolean('is_active')->default(0);
            $table->enum('shop_type', ['local','global','association'])->default('local');
            $table->dateTime('featured_expiry_date')->nullable();

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
        Schema::dropIfExists('shops');
    }
}
