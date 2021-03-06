<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HelpDeskTable extends Migration
{
    public function up()
    {
        Schema::create('tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('title');
            $table->longText('user_message');
            $table->string('priority')->default('Indefenido');
            $table->string('status')->default('análise');
            $table->dateTime('solution_date')->default('NULL');
            $table->timestamps();
        });
    }
}
