<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('product_id');
            $table->unsignedInteger('category_id')->index()->nullable();
            $table->unsignedBigInteger('brand_id')->nullable();
            $table->unsignedBigInteger('seller_id')->nullable();
           
            $table->string('product_name');
            $table->string('product_slug')->unique()->nullable()->default(null);
            $table->string('sku')->unique()->nullable()->default(null);
            $table->string('short_description')->nullable()->default(null);
            $table->string('product_image')->nullable()->default(null);
            $table->string('product_video')->nullable()->default(null);
            //create a column for available or unavailable, and default is active
            $table->enum('stock_status', ['instock','out of stock'])->default('instock');
            $table->integer('quantity');
            $table->string('weight')->nullable();
            $table->tinyInteger('is_taxable')->default(0);
            $table->float('price')->default(0);
            $table->float('sale_price')->nullable()->default(0);
            $table->float('discount')->nullable()->default(0);
            $table->text('description')->nullable();
            $table->string('product_package')->nullable();
            $table->enum('conditions', ['new','popular','recommend'])->default('new');
            $table->tinyInteger('is_featured')->default('0');
            $table->enum('status', ['active','inactive'])->default('active');
            $table->string('added_by')->nullable();

            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')
            ->on('brands')->onUpdate('cascade')->onDelete('cascade');
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
        Schema::dropIfExists('products');
    }
}
