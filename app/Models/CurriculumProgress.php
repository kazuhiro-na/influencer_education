<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumProgress extends Model
{
    use HasFactory;

    protected $table = 'curriculum_progress';

    protected $fillable = [
        'user_id',
        'curriculums_id',
        'clear_flag',
    ];

    public function users()
    {
        return $this->belongsTo(User::class, 'curriculum_progress', 'curriculums_', 'user_id')->withPivot('clear_flag');
    }

    public function curriculums()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_progress', 'user_id', 'curriculums_id')->withPivot('clear_flag');
    }
}
