<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsItem extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_item', function (Blueprint $table) {
            $table->id();
            $table->string('lang_format')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sec_category_id')->nullable();
            $table->integer('thi_category_id')->nullable();
            $table->string('has_promotion')->nullable();
            $table->string('has_discount')->default(0);
            $table->string('product_name')->nullable();
            $table->string('product_desc')->nullable();
            $table->string('product_avatar')->nullable();
            $table->string('product_price')->nullable();
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
        Schema::dropIfExists('products_item');
    }
}
