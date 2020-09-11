<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCheckoutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('checkouts', function (Blueprint $table) {
//            $table->bigIncrements('id');
            $table->increments('id');
//            $table->string('name');
            $table->unsignedInteger('order_id');

            $table->string('card_name');
//            $table->text('address');
            $table->string('card_number');
            $table->integer( 'card_expiry_month');
            $table->integer('card_expiry_year');
            $table->integer('card_cvc');
//            $table->integer('qty');
//            $table->float('total');
//            $table->integer('product_id');

            $table->timestamps();
            $table->foreign('order_id')->references('id')->on('orders')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('checkouts');
    }
}
