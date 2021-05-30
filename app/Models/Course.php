<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'matiere_id',
        'niveau_id',
        'titre',
        'view_count',
        'enrolled_count',
        'session_url',
        'status',
        'description',
        'photo',
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

    public function comments(){
        return $this->hasMany('App\Models\Comment');
    }

    public function niveau(){
        return $this->belongsTo('App\Models\Niveau');
    }
}
