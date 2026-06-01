<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Laravel\Sanctum\Sanctum;
use Tests\TestCase;

class AuthApiTest extends TestCase
{
    use RefreshDatabase;

    public function test_user_can_register_and_receive_token(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => 'API User',
            'email' => 'api@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
            'device_name' => 'tests',
        ]);

        $response
            ->assertCreated()
            ->assertJsonStructure(['message', 'user' => ['id', 'name', 'email'], 'token', 'token_type']);

        $this->assertDatabaseHas('users', [
            'email' => 'api@example.com',
        ]);
    }

    public function test_user_can_login_and_receive_token(): void
    {
        $user = User::factory()->create([
            'email' => 'api@example.com',
        ]);

        $response = $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'password',
            'device_name' => 'tests',
        ]);

        $response
            ->assertOk()
            ->assertJsonStructure(['message', 'user' => ['id', 'name', 'email'], 'token', 'token_type']);
    }

    public function test_login_rejects_invalid_credentials(): void
    {
        $user = User::factory()->create();

        $this->postJson('/api/login', [
            'email' => $user->email,
            'password' => 'wrong-password',
        ])->assertUnauthorized();
    }

    public function test_authenticated_user_can_fetch_profile_and_logout(): void
    {
        $user = User::factory()->create();
        Sanctum::actingAs($user);

        $this->getJson('/api/user')
            ->assertOk()
            ->assertJsonPath('user.id', $user->id);

        $this->postJson('/api/logout')
            ->assertOk()
            ->assertJsonPath('message', 'User logged out successfully.');
    }
}
