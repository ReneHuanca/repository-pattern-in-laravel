<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\ModelNotFoundException;

final class EloquentUserRepository implements UserRepository
{
    private $model;

    public function __construct()
    {
        $this->model = new User();
    }

    public function all(): Collection
    {
        return $this->model->all();
        // return User::all();
    }

    public function create(array $data): User
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function delete($id)
    {
        return $this->model->destroy($id);
    }

    public function find($id)
    {
        $user = $this->model->find($id);

        if (null === $user) {
            throw new ModelNotFoundException('User not found');
        }

        return $user;
    }
}