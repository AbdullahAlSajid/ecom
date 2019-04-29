<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->unsignedInteger('reg_customer')->nullable();
            $table->unsignedInteger('unreg_customer')->nullable();
            $table->string('phone');
            $table->string('address');
            $table->timestamps();

            $table->foreign('reg_customer')
                ->references('id')->on('users')
                ->onDelete('cascade');

            $table->foreign('unreg_customer')
                ->references('id')->on('unreg_customers')
                ->onDelete('cascade');
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
