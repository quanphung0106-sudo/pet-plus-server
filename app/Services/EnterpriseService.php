<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Enterprise\EnterpriseRepositoryInterface;
use Exception;

class EnterpriseService
{
    protected EnterpriseRepositoryInterface $enterpriseRepository;

    public function __construct(EnterpriseRepositoryInterface $enterpriseRepository)
    {
        $this->enterpriseRepository = $enterpriseRepository;
    }

    public function getAll()
    {
        return $this->enterpriseRepository->all();
    }

    public function create($data)
    {
        try {
            return $this->enterpriseRepository->create($data);
        } catch (Exception) {
            return false;
        }
    }

    public function detail($id)
    {
        try {
            return $this->enterpriseRepository->find($id);
        } catch (Exception) {
            return false;
        }
    }

    public function update($id, $data)
    {
        try {
            return $this->enterpriseRepository->update($id, $data);
        } catch (Exception) {
            return false;
        }
    }

    public function delete($id)
    {
        try {
            return $this->enterpriseRepository->delete($id);
        } catch (Exception) {
            return false;
        }
    }
}
