<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExerciseFormat extends Model
{
    use HasFactory;

    protected $guarded = [
        'create_at',
        'updated_at',
    ];

    public function public_type()
    {
        return $this->belongsTo(PublicType::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}
