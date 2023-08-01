<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseDetailReport\ExerciseDetailReportRepositoryInterface;

class ExerciseDetailReportService
{
    protected ExerciseDetailReportRepositoryInterface $exerciseDetailReportRepository;

    public function __construct(ExerciseDetailReportRepositoryInterface $exerciseDetailReportRepository)
    {
        $this->exerciseDetailReportRepository = $exerciseDetailReportRepository;
    }
}
