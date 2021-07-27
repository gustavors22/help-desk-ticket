<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Solution extends Migration
{
    public function up()
    {
        Schema::create('ticket_solutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->longText("solution");
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
