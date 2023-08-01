<?php

declare(strict_types=1);

namespace App\Repositories\Source;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class SourceRepository extends EloquentRepository implements SourceRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Source::class;
    }
}
