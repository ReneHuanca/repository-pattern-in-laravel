<?php

namespace Tests\Feature\Services;

use App\Services\UserCreator;
use App\Services\UserCreatorWithRepository;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserCreatorTest extends TestCase
{
    use DatabaseMigrations;

    private $service;

    protected function setUp(): void
    {
        $this->service = new UserCreator();
    }

    public function test_it_creates_and_user(): void
    {
        $data = [
            'name' => 'rene',
            'email' => 'renehuanca999@gmail.com'
        ];

        ($this->service)($data); // call to __invoke method

        $this->assertDatabaseHas('users', $data);
    }
}
