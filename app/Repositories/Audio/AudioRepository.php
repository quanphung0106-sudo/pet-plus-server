<?php

declare(strict_types=1);

namespace App\Repositories\Audio;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class AudioRepository extends EloquentRepository implements AudioRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Audio::class;
    }
}
