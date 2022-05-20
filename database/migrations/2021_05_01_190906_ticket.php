<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Ticket extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ticket',function (Blueprint $table){
            $table->id();
            $table->string('topic');
            $table->text('code');
            $table->string('importance');
            $table->text('title');
            $table->text('content');
            $table->integer('userid');
            $table->string('status')->nullable();
            $table->string('ansr')->nullable();
            $table->text('time')->nullable();
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
