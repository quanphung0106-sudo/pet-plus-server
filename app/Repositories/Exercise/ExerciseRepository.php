<?php

declare(strict_types=1);

namespace App\Repositories\Exercise;

use App\Repositories\EloquentRepository;
use Exception;
use Illuminate\Support\Facades\DB;

class ExerciseRepository extends EloquentRepository implements ExerciseRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Exercise::class;
    }

    public function getListExercise($filters, $limit)
    {
        $query = $this->model;

        foreach ($filters as $key => $where) {
            if ($where['value'] === '') {
                continue;
            }

            if ($where['where'] == 'like') {
                $query = $query->where($key, 'like', '%' . $where['value'] . '%');
            } elseif ($where['where'] == 'pivot') {
                $query = $query->whereHas($key, function ($q) use ($where) {
                    $q->whereIn($where['pivot_id'], $where['value']);
                });
//                $query = $query->select('exercises.*')
//                    ->join('exercise_exercise_units', 'exercise_id', 'exercises.id')
//                    ->whereIn('exercise_unit_id', $where['value'])
//                    ->groupBy('exercise_id')
//                    ->having(DB::raw("count(exercise_unit_id)"), '>=', count($where['value']));
            } elseif ($where['where'] == '=') {
                $query = $query->where($key, $where['value']);
            }
        }

        return $query->orderBy('exercises.id', 'desc')->paginate($limit);
    }

    public function createExercise($data)
    {
        DB::beginTransaction();
        try {
            $exercise = $this->create($data);

            if (isset($data['exercise_unit'])) {
                $exercise->exercise_units()->sync($data['exercise_unit']);
            }

            DB::commit();

            return $exercise;
        } catch (Exception) {
            DB::rollBack();
        }
    }

    public function updateExercise($id, $data)
    {
        DB::beginTransaction();
        try {
            $exercise = $this->update($id, $data);

            if (isset($data['exercise_unit'])) {
                $exercise->exercise_units()->sync($data['exercise_unit']);
            } else {
                $exercise->exercise_units()->detach();
            }

            DB::commit();

            return $exercise;
        } catch (Exception) {
            DB::rollBack();
        }
    }

    public function countVideo($videoId)
    {
        return $this->model->where('video_id', $videoId)->count();
    }

    public function countAudio($audioId)
    {
        return $this->model->where('audio_id', $audioId)->count();
    }
}
