<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Authentic extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('authentic',function (Blueprint $table){
            $table->id();
            $table->integer('userid');
            $table->string('name');
            $table->text('phone');
            $table->text('homenumber');
            $table->text('postalcode');
            $table->string('status');
            $table->text('time');
            $table->text('address');
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
        //
    }
}

