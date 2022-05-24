<?php

namespace Tests\Feature\Services;

use App\Services\SimpleUserCreator;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SimpleUserCreatorTest extends TestCase
{
    use RefreshDatabase;

    private $service;

    protected function setUp(): void
    {
        parent::setUp();

        $this->service = new SimpleUserCreator();
    }

    public function test_it_creates_and_user(): void
    {
        $data = [
            'name' => 'rene',
            'email' => 'renehuanca999@gmail.com',
            'password' => 'rene123'
        ];

        $this->service->__invoke($data);

        $this->assertDatabaseHas('users', $data);
    }
}
