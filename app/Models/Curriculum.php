<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Curriculum extends Model
{
    use HasFactory;

    protected $table = 'curriculums';

    protected $guarded = [
        'id',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function deliveryTime() {
        return $this->hasMany(DeliveryTime::class, 'curriculums_id', 'id');
    }

    public function curriculumProgress() {
        return $this->hasMany(CurriculumProgress::class, 'curriculums_id', 'id');
    }

    public function getCurriculum() {
        $curriculums = Curriculum::all();
        return $curriculums;
    }
}
