<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('car_type_id')->unsigned()->index()->nullable();
            $table->foreign('car_type_id')->references('id')->on('car_types')->onDelete('cascade');
            $table->bigInteger('branch_id')->unsigned()->index()->nullable();
            $table->foreign('branch_id')->references('id')->on('branches')->onDelete('cascade');
            $table->string('color')->nullable(false);
            $table->boolean('is_active');
            $table->boolean('maintenance');
            $table->float('hourly_price')->nullable(false);
            $table->float('tax_rate')->nullable(false);
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
        Schema::dropIfExists('cars');
    }
}
