<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseType;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseTypeRepository extends EloquentRepository implements ExerciseTypeRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseType::class;
    }
}
