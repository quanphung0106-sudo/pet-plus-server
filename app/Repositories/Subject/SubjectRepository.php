<?php

declare(strict_types=1);

namespace App\Repositories\Subject;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class SubjectRepository extends EloquentRepository implements SubjectRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Subject::class;
    }
}
