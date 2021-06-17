<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'course_id',
        'course_title',
        'course_user',
        'course_username',
        'course_matiere',
        'course_niveau',
        'status',
    ];

    public function user(){
        return $this->belongsTo('App\Models\User');
    }

    public function course(){
        return $this->belongsTo('App\Models\Course');
    }

    public function niveau(){
        return $this->belongsTo('App\Models\Niveau');
    }
}
