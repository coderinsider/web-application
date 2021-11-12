<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThirdCategory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */    
    public function up()
    {
        Schema::create('third_category', function (Blueprint $table) {
            $table->id();
            $table->string('lang_format')->nullable();
            $table->integer('category_id')->nullable();
            $table->integer('sec_category_id')->nullable();
            $table->string('third_category_name')->nullable();
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
        Schema::dropIfExists('third_category');
    }
}
