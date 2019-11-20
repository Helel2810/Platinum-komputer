<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateNewsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->increments('id');
            $table->string('image');
            $table->text('title');
            $table->text('content');
            $table->string('source');
            $table->dateTime('period');
            $table->integer('news_category_id')->unsigned();
            $table->integer('admin_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('news_category_id')->references('id')->on('news_categories');
            $table->foreign('admin_id')->references('id')->on('admins');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('news');
    }
}
