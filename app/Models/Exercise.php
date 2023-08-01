<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
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

    public function source()
    {
        return $this->belongsTo(Source::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    public function exercise_part()
    {
        return $this->belongsTo(ExercisePart::class);
    }

    public function exercise_format()
    {
        return $this->belongsTo(ExerciseFormat::class);
    }

    public function difficulty_level()
    {
        return $this->belongsTo(DifficultyLevel::class);
    }

    public function exercise_type()
    {
        return $this->belongsTo(ExerciseType::class);
    }

    public function status()
    {
        return $this->belongsTo(Status::class);
    }

    public function image()
    {
        return $this->belongsTo(Image::class);
    }

    public function video()
    {
        return $this->belongsTo(Video::class);
    }

    public function audio()
    {
        return $this->belongsTo(Audio::class);
    }

    public function exercise_units()
    {
        return $this->belongsToMany(ExerciseUnit::class, 'exercise_exercise_units', 'exercise_id', 'exercise_unit_id');
    }
}
