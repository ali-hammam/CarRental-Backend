<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRentalPaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rental_payments', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('rental_id')->unsigned()->index()->nullable();
            $table->foreign('rental_id')->references('id')->on('rentals')->onDelete('cascade');
            $table->float('payment');
            $table->float('remaining');
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
        Schema::dropIfExists('rental_payments');
    }
}
