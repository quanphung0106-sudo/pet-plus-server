<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseReportReason\ExerciseReportReasonRepositoryInterface;

class ExerciseReportReasonService
{
    protected ExerciseReportReasonRepositoryInterface $exerciseReportReasonRepository;

    public function __construct(ExerciseReportReasonRepositoryInterface $exerciseReportReasonRepository)
    {
        $this->exerciseReportReasonRepository = $exerciseReportReasonRepository;
    }
}
