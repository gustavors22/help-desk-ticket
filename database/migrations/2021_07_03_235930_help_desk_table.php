<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class HelpDeskTable extends Migration
{
    public function up()
    {
        Schema::create('help_desk_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_id');
            $table->string('name');
            $table->string('email');;
            $table->string('title');
            $table->longText('user_message');
            $table->string('priority');
            $table->longText("solution");
            $table->string('status');
            $table->dateTime('solution_date');
            $table->timestamps();
        });
    }
}
