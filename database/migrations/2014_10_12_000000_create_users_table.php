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
            // $table->string('login')->unique();
            $table->string('email')->unique();
            $table->bigInteger('role_id')->default(1);
            $table->boolean('active')->default(0);
            $table->boolean('blocked')->default(0);
            $table->integer('lang')->default(1);

            $table->string('password');
            $table->ipAddress('signup_ip')->nullable();
            $table->ipAddress('confirm_ip')->nullable();

            $table->timestamp('email_verified_at')->nullable();
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
}
