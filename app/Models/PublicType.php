<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicType extends Model
{
    use HasFactory;

    protected $guarded = [
        'create_at',
        'updated_at',
    ];
}
