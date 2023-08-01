<?php

declare(strict_types=1);

namespace App\Repositories\Image;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class ImageRepository extends EloquentRepository implements ImageRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\Image::class;
    }
}
