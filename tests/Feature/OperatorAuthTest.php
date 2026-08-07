<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class OperatorAuthTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    public function test_operator_can_authenticate_using_login_form(): void
    {
        $user = User::create([
            'name' => 'Operator Test',
            'email' => 'operator@test.com',
            'password' => bcrypt('password123'),
            'role' => 'operator',
        ]);

        $response = $this->post('/login', [
            'email' => 'operator@test.com',
            'password' => 'password123',
        ]);

        $this->assertAuthenticatedAs($user);
        $response->assertRedirect(route('operator.dashboard'));
    }

    public function test_guest_cannot_access_operator_dashboard(): void
    {
        $response = $this->get('/operator/dashboard');
        $response->assertRedirect(route('login'));
    }
}
