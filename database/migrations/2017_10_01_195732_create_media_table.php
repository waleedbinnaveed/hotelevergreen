<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('userid')->nullable() ;
            $table->string('userName')->nullable() ;
            $table->string('destination')->nullable() ;
            $table->string('location')->nullable() ;
            $table->string('mediaURL')->nullable();
            $table->char('mediaType',1);//video or picture
            $table->string('showName');//true if user want to show it 

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
        Schema::dropIfExists('media');
    }
}
