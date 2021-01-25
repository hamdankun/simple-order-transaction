<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrders extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('order_number');
            $table->datetime('order_date');
            $table->text('note')->nullable();
            $table->string('shipping_number')->nullable();
            $table->string('status')->comment('PENDING, SHIPPED, FINISH');
            $table->bigInteger('total_qty');
            $table->bigInteger('sub_total');
            $table->bigInteger('shipping_fee');
            $table->bigInteger('grand_total');
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
        Schema::dropIfExists('orders');
    }
}
