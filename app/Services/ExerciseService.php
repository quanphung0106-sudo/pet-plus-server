<?php

declare(strict_types=1);

namespace App\Services;

use App\Enums\PerPageLimit;
use App\Repositories\Exercise\ExerciseRepositoryInterface;
use Exception;

class ExerciseService
{
    protected ExerciseRepositoryInterface $exerciseRepository;

    public function __construct(ExerciseRepositoryInterface $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function getListExercise($params)
    {
        $limit = $params['limit'] ?? PerPageLimit::BASIC_LIMIT;

        $filters = [
            'sources_id' => [
                'where' => '=',
                'value' => null,
            ],
            'level_id' => [
                'where' => '=',
                'value' => null,
            ],
            'subject_id' => [
                'where' => '=',
                'value' => null,
            ],
            'exercise_part_id' => [
                'where' => '=',
                'value' => null,
            ],
            'exercise_format_id' => [
                'where' => '=',
                'value' => null,
            ],
            'exercise_units' => [
                'where' => 'pivot',
                'pivot_id' => 'exercise_unit_id',
                'value' => null,
            ],
            'difficulty_level_id' => [
                'where' => '=',
                'value' => null,
            ],
            'exercise_type_id' => [
                'where' => '=',
                'value' => null,
            ],
            'status_id' => [
                'where' => '=',
                'value' => null,
            ],
            'user_id' => [
                'where' => '=',
                'value' => null,
            ],
            'enterprise_id' => [
                'where' => '=',
                'value' => null,
            ],
            'public_type_id' => [
                'where' => '=',
                'value' => null,
            ],
        ];

        $filters['sources_id']['value'] = $params['source_id'] ?? '';
        $filters['level_id']['value'] = $params['level_id'] ?? '';
        $filters['subject_id']['value'] = $params['subject_id'] ?? '';
        $filters['exercise_part_id']['value'] = $params['exercise_part_id'] ?? '';
        $filters['exercise_format_id']['value'] = $params['exercise_format_id'] ?? '';
        $filters['exercise_units']['value'] = $params['exercise_units'] ?? '';
        $filters['difficulty_level_id']['value'] = $params['difficulty_level_id'] ?? '';
        $filters['exercise_type_id']['value'] = $params['exercise_type_id'] ?? '';
        $filters['status_id']['value'] = $params['status_id'] ?? '';
        $filters['user_id']['value'] = $params['user_id'] ?? '';
        $filters['enterprise_id']['value'] = $params['enterprise_id'] ?? '';
        $filters['public_type_id']['value'] = $params['public_type_id'] ?? '';

        return $this->exerciseRepository->getListExercise($filters, $limit);
    }

    public function create($data)
    {
        try {
            return $this->exerciseRepository->createExercise($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->exerciseRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->exerciseRepository->updateExercise($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->exerciseRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }

    public function countVideo($videoId)
    {
        try {
            return $this->exerciseRepository->countVideo($videoId);
        } catch (Exception) {
            return false;
        }
    }

    public function countAudio($audioId)
    {
        try {
            return $this->exerciseRepository->countAudio($audioId);
        } catch (Exception) {
            return false;
        }
    }
}
