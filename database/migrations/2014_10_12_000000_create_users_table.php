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
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('userrole')->default('user');
            $table->string('phone')->unique();
            $table->string('avatar')->nullable();
            $table->integer('status')->default(0);
            $table->string('gender')->nullable();
            $table->string('show_pass')->nullable();
            $table->integer('my_cash')->default(0);
            $table->integer('coupon_one');
            $table->integer('coupon_two');
            $table->integer('coupon_three');

            $table->string('password');
            $table->timestamp('email_verified_at')->nullable();
            // $table->string('password');
            $table->rememberToken();
            // $table->foreignId('current_team_id')->nullable();
            // $table->string('profile_photo_path', 2048)->nullable();
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
