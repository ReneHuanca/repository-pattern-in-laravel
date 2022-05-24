<?php

namespace Tests\Unit\Services;

use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserCreator;
use Mockery;
use PHPUnit\Framework\TestCase;

class UserCreatorTest extends TestCase
{
    private $repository;
    private $service;
    
    public function setUp(): void
    {
        $this->repository = Mockery::mock(UserRepository::class);
        $this->service    = new UserCreator($this->repository);
    }
    
    public function test_it_creates_an_user(): void
    {
        $userArray = [
            'name' => 'rene',
            'email' => 'rene@gmail.com',
            'password' => 'rene123'
        ];

        $user = new User();
        $user->fill($userArray);

        $this->repository
                ->shouldReceive('create')->with($userArray)
                ->andReturn($user);
 
        $userCreated = $this->service->__invoke($userArray);

        $this->assertEquals($user, $userCreated);
    }
}
