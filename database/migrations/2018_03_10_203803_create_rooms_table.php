<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->increments('id');
            $table->string('rno')->nullable();
            $table->string('desc')->nullable() ;
            $table->string('type')->nullable() ;
            $table->string('mediaURL')->nullable() ;
            $table->string('bookedBy')->nullable() ; //id of user
            $table->string('status')->nullable() ; //id of user
            $table->string('price')->nullable() ; //id of user

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
        Schema::dropIfExists('rooms');
    }
}
