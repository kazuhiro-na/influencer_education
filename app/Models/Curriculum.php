<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    public function classroom()
    {
        return $this->belongsTo(Classroom::class, 'classes_id');
        
    }

    public function users()
    {
        return $this->belongsToMany(User::class, 'curriculum_progress', 'users_id', 'curriculums_id')->withPivot('clear_flag');
    }
}
