<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }

    public function curriculumProgress()
    {
        return $this->hasMany(CurriculumProgress::class);
    }
}
