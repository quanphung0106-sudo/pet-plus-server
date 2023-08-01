<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseUnit;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseUnitRepository extends EloquentRepository implements ExerciseUnitRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseUnit::class;
    }
}
