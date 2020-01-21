<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->integer('customer_id')->unsigned();
            $table->integer('admin_id')->unsigned()->nullable();
            $table->integer('shipping_cost_id')->unsigned()->nullable();
            $table->integer('address_id')->unsigned()->nullable();
            $table->integer('coupon_id')->unsigned()->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->foreign('shipping_cost_id')->references('id')->on('shipping_costs');
            $table->foreign('address_id')->references('id')->on('addresses');
            $table->foreign('coupon_id')->references('id')->on('coupons');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
