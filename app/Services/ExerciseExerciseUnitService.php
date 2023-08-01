<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseExerciseUnit\ExerciseExerciseUnitRepositoryInterface;

class ExerciseExerciseUnitService
{
    protected ExerciseExerciseUnitRepositoryInterface $exerciseExerciseUnitRepository;

    public function __construct(ExerciseExerciseUnitRepositoryInterface $exerciseExerciseUnitRepository)
    {
        $this->exerciseExerciseUnitRepository = $exerciseExerciseUnitRepository;
    }
}
