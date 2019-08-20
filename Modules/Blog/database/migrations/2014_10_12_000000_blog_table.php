<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BlogTable extends Migration
{
    public function up()
    {
        Schema::create('blogs', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('name');
            $table->string('slug')->unique();
            $table->text('info_preview')->nullable();
            $table->text('info_full')->nullable();
            $table->string('image')->nullable();

            //meta
            $table->string('meta_title')->nullable();
            $table->string('meta_description')->nullable();
            $table->text('ldjson')->nullable();

            $table->integer('lang')->default(1);
            $table->biginteger('category_id')->unsigned()->nullable();

            $table->timestamp('published_at')->nullable();
            $table->timestamp('published_to')->nullable();

            $table->boolean('active')->default(1);
            $table->bigInteger('created_by')->nullable();
            $table->bigInteger('modifed_by')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
    }
}
