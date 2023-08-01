<?php

declare(strict_types=1);

namespace App\Repositories\Exercise;

use App\Repositories\EloquentRepositoryInterface;

interface ExerciseRepositoryInterface extends EloquentRepositoryInterface
{
    public function getListExercise($filters, $limit);

    public function createExercise($data);

    public function updateExercise($id, $data);

    public function countVideo($videoId);

    public function countAudio($audioId);
}
