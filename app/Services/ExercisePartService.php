<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExercisePart\ExercisePartRepositoryInterface;
use Exception;

class ExercisePartService
{
    protected ExercisePartRepositoryInterface $exercisePartRepository;

    public function __construct(ExercisePartRepositoryInterface $exercisePartRepository)
    {
        $this->exercisePartRepository = $exercisePartRepository;
    }

    public function getAll()
    {
        return $this->exercisePartRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->exercisePartRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->exercisePartRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->exercisePartRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->exercisePartRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
