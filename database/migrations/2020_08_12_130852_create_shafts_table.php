<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShaftsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shafts', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('employe_id')->unsigned();
            $table->date('date')->nullable();	
            $table->text('description')->nullable();
            $table->double('expect')->nullable();

            $table->double('genter')->nullable();
            $table->double('lost')->nullable();




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
        Schema::dropIfExists('shafts');
    }
}
