<?php

namespace App\Models\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelHelpTicket extends Model
{
    protected $table = 'help_desk_tickets';
    protected $fillable = [
        "ticket_id",
        "name",
        "email",
        "title",
        "user_message",
        "priority",
        "solution",
        'support_name',
        'support_email',
        "solution_date"
    ];

    public function getSolutionDateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('d-m-Y H:i:s') : $value;
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y H:i:s');
    }

    public function changeDateToUTC($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}