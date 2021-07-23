<?php

namespace App\Models\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSolvedTicket extends Model
{  
    protected $table = 'solved_tickets';
    protected $fillable = [
        'ticket_code',
        'user_name',
        'user_email',
        'support_person_name',
        'support_person_emeil',
        'ticket_closing_date'
    ];
}
