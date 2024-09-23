<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Curriculum extends Model
{
    use HasFactory;
    protected $table = 'curriculums';

    protected $fillable = [
        'title',
        'description',
        'thumbnail',
        'video_url',
        'alway_delivery_flg',
        'grade_id',
    ];

    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    
    public function progress()
    {
        return $this->hasMany(CurriculumProgress::class);
    }
}
