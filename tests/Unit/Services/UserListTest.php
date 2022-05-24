<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UsersList;
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
        $usersList = [
            new User(),
            new User()
        ];

        $this->repository
                ->shouldReceive('all')
                ->andReturn($usersList);

        $obtainAllUser = $this->service->__invoke(); 

        $this->assertEquals($usersList, $obtainAllUser);
    }
}
