<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseType\ExerciseTypeRepositoryInterface;

class ExerciseTypeService
{
    protected ExerciseTypeRepositoryInterface $exerciseTypeRepository;

    public function __construct(ExerciseTypeRepositoryInterface $exerciseTypeRepository)
    {
        $this->exerciseTypeRepository = $exerciseTypeRepository;
    }
}
