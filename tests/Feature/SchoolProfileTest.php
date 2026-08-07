<?php

namespace Tests\Feature;

use App\Models\SchoolProfile;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class SchoolProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_public_homepage_loads_successfully(): void
    {
        SchoolProfile::create([
            'name' => 'SDN Tunggaljaya 2 Test',
            'vision' => 'Visi Test',
            'student_count' => 100,
            'teacher_count' => 10,
            'class_count' => 6,
        ]);

        $response = $this->get('/');
        $response->assertStatus(200);
        $response->assertSee('SDN Tunggaljaya 2 Test');
    }

    public function test_operator_can_update_school_profile(): void
    {
        $operator = User::create([
            'name' => 'Operator Test',
            'email' => 'operator@test.com',
            'password' => bcrypt('password123'),
            'role' => 'operator',
        ]);

        $response = $this->actingAs($operator)->post(route('operator.profile.update'), [
            'name' => 'SDN Tunggaljaya 2 Updated',
            'student_count' => 400,
            'teacher_count' => 25,
            'class_count' => 12,
            'vision' => 'Visi Unggul Baru',
            'mission_text' => "Misi 1\nMisi 2",
        ]);

        $response->assertSessionHas('success');
        $this->assertDatabaseHas('school_profiles', [
            'name' => 'SDN Tunggaljaya 2 Updated',
            'student_count' => 400,
        ]);
    }
}
