<?php

declare(strict_types=1);

namespace App\Repositories\Enterprise;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class EnterpriseRepository extends EloquentRepository implements EnterpriseRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Enterprise::class;
    }
}
