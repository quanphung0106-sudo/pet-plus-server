<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Level\LevelRepositoryInterface;
use Exception;

class LevelService
{
    protected LevelRepositoryInterface $levelRepository;

    public function __construct(LevelRepositoryInterface $levelRepository)
    {
        $this->levelRepository = $levelRepository;
    }

    public function getAll()
    {
        return $this->levelRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->levelRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->levelRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->levelRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->levelRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
