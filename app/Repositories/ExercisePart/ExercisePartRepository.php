<?php

declare(strict_types=1);

namespace App\Repositories\ExercisePart;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExercisePartRepository extends EloquentRepository implements ExercisePartRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExercisePart::class;
    }
}
