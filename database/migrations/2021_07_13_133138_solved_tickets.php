<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class SolvedTickets extends Migration
{
    
    public function up()
    {
        Schema::create('solved_tickets', function (Blueprint $table) {
            $table->id();
            $table->string('ticket_code');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('support_person_name');
            $table->string('support_person_email');
            $table->dateTime('ticket_closing_date');
            $table->timestamps();
        });
    }

    public function down()
    {
        //
    }
}
