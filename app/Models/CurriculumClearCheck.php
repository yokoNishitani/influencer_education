<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CurriculumClearCheck extends Model
{
    use HasFactory;

    protected $table = 'classes_clear_checks';

    protected $guarded = [
        'id',
    ];

    public function grade() {
        return $this->belongsTo(Grade::class, 'grade_id', 'id');
    }

    public function user() {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
