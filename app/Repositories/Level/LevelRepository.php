<?php

declare(strict_types=1);

namespace App\Repositories\Level;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class LevelRepository extends EloquentRepository implements LevelRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Level::class;
    }
}
