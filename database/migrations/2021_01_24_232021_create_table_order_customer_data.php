<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableOrderCustomerData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_customer_data', function (Blueprint $table) {
            $table->id();
            $table->integer('order_id');
            $table->string('name', 100);
            $table->string('phone', 100);
            $table->string('email', 100);
            $table->text('address');
            $table->string('payment_proof_path')->nullable();
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
        Schema::dropIfExists('order_customer_data');
    }
}
