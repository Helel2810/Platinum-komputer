<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateShippingCostsTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipping_costs', function (Blueprint $table) {
            $table->increments('id');
            $table->float('price');
            $table->integer('shipping_method_id')->unsigned();
            $table->integer('courier_id')->unsigned();
            $table->integer('district_id')->unsigned();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('shipping_method_id')->references('id')->on('shipping_methods');
            $table->foreign('courier_id')->references('id')->on('couriers');
            $table->foreign('district_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shipping_costs');
    }
}
