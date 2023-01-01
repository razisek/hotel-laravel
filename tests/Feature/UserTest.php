<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    use WithFaker;
    
    public function test_login_user()
    {
        $email = $this->faker->email;

        User::factory()->create([
            'email' => $email,
            'password' => bcrypt('password')
        ]);

        $response = $this->post('/api/login', [
            'email' => $email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }

    public function test_email_login_required()
    {
        $response = $this->post('/api/login', [
            'email' => '',
            'password' => 'password'
        ]);

        $response->assertStatus(422);
    }

    public function test_email_login_not_valid()
    {
        $response = $this->post('/api/login', [
            'email' => 'azis',
            'password' => 'password'
        ]);

        $response->assertStatus(422);
    }

    public function test_email_login_length_more_than_255()
    {
        $response = $this->post('/api/login', [
            'email' => $this->faker->sentence(256),
            'password' => 'password'
        ]);

        $response->assertStatus(422);
    }

    public function test_password_login_required()
    {
        $response = $this->post('/api/login', [
            'email' => $this->faker->email,
            'password' => ''
        ]);

        $response->assertStatus(422);
    }

    public function test_register_user()
    {
        $response = $this->post('/api/register', [
            'name' => $this->faker->name,
            'email' => $this->faker->email,
            'password' => 'password'
        ]);

        $response->assertStatus(200);
    }
}
