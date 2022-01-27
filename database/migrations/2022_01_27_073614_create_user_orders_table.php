<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_orders', function (Blueprint $table) {
            $table->id();
            $table->string('product_name');
            $table->unsignedInteger('product_quantity');
            $table->unsignedBigInteger('product_price');
            $table->unsignedInteger('product_id');
            $table->string('product_image');
            $table->string('order_status');
	        $table->string('coupon_used')->nullable();
	        $table->unsignedBigInteger('coupon_discount')->nullable();
            $table->unsignedBigInteger('total_amount');
	        $table->string('user_email');
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
        Schema::dropIfExists('user_orders');
    }
}
