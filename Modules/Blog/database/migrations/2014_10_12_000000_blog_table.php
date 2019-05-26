<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogTable extends Migration
{

  public function up()
  {
    Schema::create('blogs', function (Blueprint $table) {
      $table->bigIncrements('id');
      
    });
  }

  public function down()
  {
    Schema::dropIfExists('blogs');
  }
}
