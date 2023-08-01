<?php

declare(strict_types=1);

namespace App\Repositories\Video;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class VideoRepository extends EloquentRepository implements VideoRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Video::class;
    }
}
