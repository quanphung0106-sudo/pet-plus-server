<?php

declare(strict_types=1);

namespace App\Repositories\ExerciseReportReason;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ExerciseReportReasonRepository extends EloquentRepository implements ExerciseReportReasonRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\ExerciseReportReason::class;
    }
}
