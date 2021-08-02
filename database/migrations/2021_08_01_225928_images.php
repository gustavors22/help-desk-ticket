<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Images extends Migration
{
    public function up()
    {
        Schema::create('images', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('ticket_id');
            $table->foreign('ticket_id')->references('id')->on('tickets');
            $table->text('path');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
