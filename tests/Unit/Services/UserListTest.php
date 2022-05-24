<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UsersList;
use Illuminate\Database\Eloquent\Collection;
use Mockery;
use PHPUnit\Framework\TestCase;

class UserListTest extends TestCase
{
    private $repository;
    private $service;

    public function setUp(): void
    {
        $this->repository = Mockery::mock(UserRepository::class);
        $this->service    = new UsersList($this->repository); 
    }   

    public function test_users_list_can_be_retrieved(): void
    {
        $usersList = new Collection();

        $this->repository
                ->shouldReceive('all')
                ->andReturn($usersList);

        $getAllUsers = $this->service->__invoke(); 

        $this->assertEquals($usersList, $getAllUsers);
    }
}
