<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseDetailReport;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseDetailReportRepository extends EloquentRepository implements ExerciseDetailReportRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseDetailReport::class;
    }
}
