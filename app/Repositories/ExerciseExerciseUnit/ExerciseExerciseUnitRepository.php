<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseExerciseUnit;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseExerciseUnitRepository extends EloquentRepository implements ExerciseExerciseUnitRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseExerciseUnit::class;
    }
}
