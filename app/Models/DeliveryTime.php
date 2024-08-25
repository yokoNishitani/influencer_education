<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DeliveryTime extends Model
{
    use HasFactory;

    protected $table = 'delivery_times';

    protected $guarded = [
        'id',
    ];

    public function curriculum() {
        return $this->belongsTo(Curriculum::class, 'curriculums_id', 'id');
    }
}
