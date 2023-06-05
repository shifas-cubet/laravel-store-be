<?php

namespace Tests\Feature;

use App\Models\User;
use Database\Factories\UserFactory;
use Faker\Provider\Address;
use Faker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_a_basic_request(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_user_registration()
    {

        $faker = Faker\Factory::create();
        
        $email = $faker->email();

        $response = $this->post('/api/register', [
            'name' => $faker->name(),
            'email' => $email,
            "password" => '12345678$A',
            "password_confirmation" => '12345678$A',
            "phone_number" => "1234567890"
        ]);

        $response->assertStatus(200);

        $this->assertDatabaseHas('users', [
            'email' => $email
        ]);

    }

}
