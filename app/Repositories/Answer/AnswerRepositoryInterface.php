<?php

declare(strict_types=1);

namespace App\Repositories\Answer;

use App\Repositories\EloquentRepositoryInterface;

interface AnswerRepositoryInterface extends EloquentRepositoryInterface
{
    public function getAll($exercise_id);
}
