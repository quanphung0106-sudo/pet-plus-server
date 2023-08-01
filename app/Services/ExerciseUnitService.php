<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseUnit\ExerciseUnitRepositoryInterface;
use Exception;

class ExerciseUnitService
{
    protected ExerciseUnitRepositoryInterface $exerciseUnitRepository;

    public function __construct(ExerciseUnitRepositoryInterface $exerciseUnitRepository)
    {
        $this->exerciseUnitRepository = $exerciseUnitRepository;
    }

    public function getAll()
    {
        return $this->exerciseUnitRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->exerciseUnitRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->exerciseUnitRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->exerciseUnitRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->exerciseUnitRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
