<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Subject\SubjectRepositoryInterface;
use Exception;

class SubjectService
{
    protected SubjectRepositoryInterface $subjectRepository;

    public function __construct(SubjectRepositoryInterface $subjectRepository)
    {
        $this->subjectRepository = $subjectRepository;
    }

    public function getAll()
    {
        return $this->subjectRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->subjectRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->subjectRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->subjectRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->subjectRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
