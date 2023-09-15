<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $table = 'classes';

    public function users()
    {
        return $this->hasMany(User::class, 'class_id');
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class, 'classes_id');
    }
}
