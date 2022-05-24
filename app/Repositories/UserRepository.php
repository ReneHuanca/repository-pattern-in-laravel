<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;

interface UserRepository
{
    public function all();

    public function create(array $data): User;

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}