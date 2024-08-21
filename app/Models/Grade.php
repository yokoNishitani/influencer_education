<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    public function users() {
        return $this->hasMany(User::class);
    }

    public function curriculums()
    {
        return $this->hasMany(Curriculum::class);
    }
}
