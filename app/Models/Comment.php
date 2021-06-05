<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Comment extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'course_id',
        'course_title',
        'matiere_id',
        'niveau_id',
        'body',
    ];

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }
}
