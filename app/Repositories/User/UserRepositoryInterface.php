<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Repositories\EloquentRepositoryInterface;

interface UserRepositoryInterface extends EloquentRepositoryInterface
{
    public function getUserByEmail($email);

    public function register($data);
}
