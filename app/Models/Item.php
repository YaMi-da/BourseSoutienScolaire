<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matiere_id',
        'niveau_id',
        'titre',
        'view_count',
        'url',
        'description',
        
    ];
}
