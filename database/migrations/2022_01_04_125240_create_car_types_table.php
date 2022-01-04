<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCarTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('car_types', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('manufacturer_id')->unsigned()->index()->nullable();
            $table->foreign('manufacturer_id')->references('id')->on('manufacturers')->onDelete('cascade');
            $table->string('model')->nullable(false);
            $table->string('type');
            $table->integer('number_of_seats')->nullable(false);
            $table->year('year');
            $table->timestamps();
        });
        DB::statement('ALTER TABLE car_types ADD CHECK (`type` IN ("SEDAN", "COUPE", "SPORT", "HATCHBACK","MINIVAN"))');
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('car_types');
    }
}
