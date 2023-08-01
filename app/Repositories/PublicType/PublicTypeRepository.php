<?php

declare(strict_types=1);

namespace App\Repositories\PublicType;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class PublicTypeRepository extends EloquentRepository implements PublicTypeRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\PublicType::class;
    }
}
