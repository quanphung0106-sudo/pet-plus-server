<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseFormat;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseFormatRepository extends EloquentRepository implements ExerciseFormatRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseFormat::class;
    }
}
