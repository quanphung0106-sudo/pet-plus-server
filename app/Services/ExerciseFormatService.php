<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\ExerciseFormat\ExerciseFormatRepositoryInterface;
use Exception;

class ExerciseFormatService
{
    protected ExerciseFormatRepositoryInterface $exerciseFormatRepository;

    public function __construct(ExerciseFormatRepositoryInterface $exerciseFormatRepository)
    {
        $this->exerciseFormatRepository = $exerciseFormatRepository;
    }

    public function getAll()
    {
        return $this->exerciseFormatRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->exerciseFormatRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->exerciseFormatRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->exerciseFormatRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->exerciseFormatRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
