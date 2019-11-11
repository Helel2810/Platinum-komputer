<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAdminsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('user_name')->unique();
            $table->string('password');
            $table->string('email')->unique();
            $table->string('status');
            $table->integer('admin_role_id')->unsigned();
            $table->timestamps();
            $table->rememberToken();
            $table->softDeletes();
            $table->foreign('admin_role_id')->references('id')->on('admin_roles');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('admins');
    }
}
