<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\PublicType\PublicTypeRepositoryInterface;

class PublicTypeService
{
    protected PublicTypeRepositoryInterface $publicTypeRepository;

    public function __construct(PublicTypeRepositoryInterface $publicTypeRepository)
    {
        $this->publicTypeRepository = $publicTypeRepository;
    }
}
