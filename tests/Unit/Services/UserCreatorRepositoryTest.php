<?php

namespace Tests\Unit\Services;

use App\Repositories\UserRepository;
use App\Services\UserCreatorWithRepository;
use Mockery;
use Tests\TestCase;

class UserCreatorRepositoryTest extends TestCase
{
    protected $repository;
    private $service;
    
    public function setUp(): void
    {
        $this->repository = Mockery::mock(UserRepository::class);
        $this->service = new UserCreatorWithRepository($this->repository);
    }
    
    public function test_it_creates_an_user(): void
    {
        $data = [
            'name' => 'rene',
            'email' => 'renehuanca999@gmail.com'
        ];

        $this->repository->shouldRecieve('create')->with($data);

        ($this->service)($data); // call to __invoke method
    }
}
