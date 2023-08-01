<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Status\StatusRepositoryInterface;

class StatusService
{
    protected StatusRepositoryInterface $statusRepository;

    public function __construct(StatusRepositoryInterface $statusRepository)
    {
        $this->statusRepository = $statusRepository;
    }
}
