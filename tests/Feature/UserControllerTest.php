<?php

namespace Tests\Feature;

use App\Models\User;
use App\Repositories\EloquentUserRepository;
use App\Services\UsersList;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
    use RefreshDatabase;

    public function test_index_page_can_be_rendered(): void
    {
        $response = $this->get(route('users.index'));

        $respository = new EloquentUserRepository();
        $list = new UsersList($respository);         

        $response->assertStatus(200);
        $response->assertViewIs('user.index');
        $response->assertViewHas('users', $list->__invoke());
    }

    public function test_creating_page_can_be_rendered(): void
    {
        $response = $this->get(route('users.create'));

        $response->assertStatus(200);
        $response->assertViewIs('user.create');
    }

    public function test_user_can_be_created(): void
    {
        $data = [
            'name' => 'test',
            'email' => 'test@test.com',
            'password' => 'test123'
        ];

        $response = $this->post(route('users.store'), $data);

        $response->assertStatus(302);
        $response->assertRedirect(route('users.index'));
        $this->assertDatabaseHas('users', $data);
    }
}
