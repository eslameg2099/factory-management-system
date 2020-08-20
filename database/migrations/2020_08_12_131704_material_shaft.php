<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class MaterialShaft extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('material_shaft', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('material_id')->unsigned();
            $table->integer('shaft_id')->unsigned();
            $table->integer('quantity')->default(1);

            $table->foreign('material_id')->references('id')->on('materials')->onDelete('cascade');
            $table->foreign('shaft_id')->references('id')->on('shafts')->onDelete('cascade');




            $table->timestamps();
        });
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
