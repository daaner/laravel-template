<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Setting extends Migration
{

  public function up()
  {
    Schema::create('settings', function (Blueprint $table) {
      $table->bigIncrements('id');
      $table->string('name');
      $table->string('description');
      $table->boolean('value')->default(0);
      $table->timestamps();
    });
  }


  public function down()
  {
    Schema::dropIfExists('settings');
  }
}
