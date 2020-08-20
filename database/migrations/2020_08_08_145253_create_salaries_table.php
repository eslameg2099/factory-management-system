<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employe_id')->unsigned();
            $table->double('price')->nullable();

            $table->double('payment')->nullable();
            $table->double('rest')->nullable();
            $table->double('pouns')->nullable();
            $table->double('total')->nullable();
            $table->string('date');	

            $table->foreign('employe_id')->references('id')->on('employes')->onDelete('cascade');


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
        Schema::dropIfExists('salaries');
    }
}
