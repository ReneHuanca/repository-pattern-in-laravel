<?php

declare(strict_types=1);

namespace App\Services;

use App\Repositories\UserRepository;
use Illuminate\Database\Eloquent\Collection;

final class UsersList
{
    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function __invoke(): Collection
    {
        return $this->repository->all();
    }
}