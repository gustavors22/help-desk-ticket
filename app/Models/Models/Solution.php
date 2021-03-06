<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Solution extends Model
{  
    protected $table = 'solutions';
    protected $fillable = [
        'ticket_id',
        'support_id',
        'solution'
    ];

    public function user()
    {
        return $this->hasMany(User::class);
    }

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }

    public function getOwnerSolution($id)
    {
        return User::find($id);
    }
}
