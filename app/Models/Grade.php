<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Grade extends Model
{
    use HasFactory;

    protected $table = 'grades';

    protected $guarded = [
        'id',
    ];

    public function curriculum() {
        return $this->hasMany(Curriculum::class, 'grade_id', 'id');
    }

    public function showCurriculum($id) {
        $grades = Grade::find($id);
        return $grades;
    }
}
