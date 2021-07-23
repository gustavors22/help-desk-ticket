<?php

namespace App\Models\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelSupport extends Model
{  
    protected $table = 'support';
    protected $fillable = [
        "name",
        "email",
        "password"
    ];
}
