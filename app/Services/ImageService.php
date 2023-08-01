<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\Image\ImageRepositoryInterface;

class ImageService
{
    protected ImageRepositoryInterface $imageRepository;

    public function __construct(ImageRepositoryInterface $imageRepository)
    {
        $this->imageRepository = $imageRepository;
    }
}
