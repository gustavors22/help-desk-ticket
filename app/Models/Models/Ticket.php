<?php

namespace App\Models\Models;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    protected $fillable = [
        "ticket_id",
        "name",
        "email",
        "user_id",
        "title",
        "user_message",
        "priority",
        "solution",
        "solution_date"
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function getOwner($user_id)
    {
        return User::find($user_id);
    }

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