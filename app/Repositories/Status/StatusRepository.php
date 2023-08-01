<?php

declare(strict_types=1);

namespace App\Repositories\Status;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class StatusRepository extends EloquentRepository implements StatusRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Status::class;
    }
}
