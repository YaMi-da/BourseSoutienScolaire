<?php

namespace App\Models;

use App\Notifications\NewComment;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class Course extends Model
{
    use HasFactory;
    use Notifiable;

    protected $fillable = [
        'user_id',
        'user_name',
        'matiere_id',
        'niveau_id',
        'titre',
        'view_count',
        'enrolled_count',
        'session_url',
        'status',
        'description',
        'comment_count',
        'photo',
        'debut_seance',
        'fin_seance',
    ];

    public function matiere(){
        return $this->belongsTo('App\Models\Matiere');
    }

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function users(){
        return $this->belongsToMany('App\Models\User', 'course_users')
                ->withPivot('created_at');
    }

    public function comment(){
        return $this->belongsTo('App\Models\Comment');
    }

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function niveau(){
        return $this->belongsTo('App\Models\Niveau');
    }
}
