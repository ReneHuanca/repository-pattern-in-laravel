<?php

declare(strict_types=1);

namespace App\Repositories;

use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

interface UserRepository
{
    public function all(): Collection;

    public function create(array $data): User;

    public function update(array $data, $id);

    public function delete($id);

    public function find($id);
}