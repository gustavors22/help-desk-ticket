<?php

namespace App\Models\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Image extends Model
{  
    protected $table = 'images';
    protected $fillable = [
        'ticket_id',
        'path'
    ];

    public function ticket()
    {
        return $this->belongsTo(Ticket::class);
    }
}
