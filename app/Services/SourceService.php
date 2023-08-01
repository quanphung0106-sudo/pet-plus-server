<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Source\SourceRepositoryInterface;
use Exception;

class SourceService
{
    protected SourceRepositoryInterface $sourceRepository;

    public function __construct(SourceRepositoryInterface $sourceRepository)
    {
        $this->sourceRepository = $sourceRepository;
    }

    public function getAll()
    {
        return $this->sourceRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->sourceRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->sourceRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->sourceRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->sourceRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
