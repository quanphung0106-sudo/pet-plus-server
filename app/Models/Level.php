<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
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
}
