<?php

declare(strict_types=1);

namespace App\Repositories\DifficultyLevel;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class DifficultyLevelRepository extends EloquentRepository implements DifficultyLevelRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\DifficultyLevel::class;
    }
}
