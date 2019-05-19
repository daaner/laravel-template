<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UserToken extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('user_tokens', function (Blueprint $table) {
        $table->bigIncrements('id');
        $table->biginteger('user_id')->unsigned();
        $table->string('api_token');
        $table->dateTime('sync_at')->nullable();
        $table->ipAddress('last_ip')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('user_tokens');
    }
}
