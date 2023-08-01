<?php

declare(strict_types=1);

namespace App\Repositories\Answer;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class AnswerRepository extends EloquentRepository implements AnswerRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Answer::class;
    }

    public function getAll($exercise_id)
    {
        return $this->model->where('exercise_id', $exercise_id)->get();
    }
}
