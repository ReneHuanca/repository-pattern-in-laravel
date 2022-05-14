<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\User;
use App\Repositories\UserRepository;

final class UserCreatorWithRepository
{
    private $repository;

    public function __construct(UserRepository $repository)
    {
        $this->respository = $repository;
    }

    public function __invoke(array $data): User
    {
        return $this->repository->create($data);
    }
}