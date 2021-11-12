<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserShopCartBox extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_shop_cart_box', function (Blueprint $table) {
            $table->id();
            $table->integer('shop_cart_type')->nullable();
            $table->integer('product_item_id')->nullable();
            $table->integer('is_buy')->nullable();
            $table->integer('is_left')->nullable();
            $table->integer('user_id')->nullable();
            $table->integer('product_count')->default(1);
            $table->integer('product_price')->nullable();
            $table->integer('product_total')->nullable();
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
        Schema::dropIfExists('user_shop_cart_box');
    }
}
