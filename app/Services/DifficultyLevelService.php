<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\DifficultyLevel\DifficultyLevelRepositoryInterface;

class DifficultyLevelService
{
    protected DifficultyLevelRepositoryInterface $difficultyLevelRepository;

    public function __construct(DifficultyLevelRepositoryInterface $difficultyLevelRepository)
    {
        $this->difficultyLevelRepository = $difficultyLevelRepository;
    }
}
