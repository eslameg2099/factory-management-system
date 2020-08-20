<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContenersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('conteners', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('qclii_id')->unsigned();
            $table->string('type');
            $table->double('commit');

            $table->double('total_price')->nullable();
            $table->double('payment')->nullable();
            $table->double('rest')->nullable();


            $table->timestamps();
            
            $table->foreign('qclii_id')->references('id')->on('qclis')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('conteners');
    }
}
