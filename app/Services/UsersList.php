<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;

final class UsersList
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke()
    {
        return $this->repository->all();
    }
}