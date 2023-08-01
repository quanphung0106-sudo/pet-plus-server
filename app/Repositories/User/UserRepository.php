<?php

declare(strict_types=1);

namespace App\Repositories\User;

use App\Repositories\EloquentRepository;
use Illuminate\Support\Facades\DB;

class UserRepository extends EloquentRepository implements UserRepositoryInterface
{
    /**
     * get model.
     * @return string
     */
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUserByEmail($email)
    {
        return $this->model->where('email', $email)->first();
    }

    public function register($data)
    {
        return $this->model->create($data);
    }
}
