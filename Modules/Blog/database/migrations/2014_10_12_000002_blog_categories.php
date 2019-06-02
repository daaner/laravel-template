<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BlogCategories extends Migration
{

  public function up()
  {
    Schema::create('blog_categories', function (Blueprint $table) {
      $table->bigIncrements('id');

      $table->string('name');
      $table->string('slug')->unique();
      $table->text('info_preview')->nullable();
      // $table->text('info_full')->nullable();

      $table->string('icon')->nullable();
      $table->string('image')->nullable();

      //meta
      $table->string('meta_title')->nullable();
      $table->string('meta_description')->nullable();
      $table->text('ldjson')->nullable();

      $table->integer('lang')->default(1);
      $table->biginteger('category_id')->unsigned()->nullable();

      $table->boolean('active')->default(1);
      $table->bigInteger('created_by')->nullable();
      $table->bigInteger('modifed_by')->nullable();
      $table->softDeletes();
      $table->timestamps();
    });
  }

  public function down()
  {
    Schema::dropIfExists('blog_categories');
  }
}
