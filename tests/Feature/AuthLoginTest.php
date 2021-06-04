<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class AuthLoginTest extends TestCase
{

    public function testRequiredFieldsForLogin()
    {
        $this->json('POST', 'api/login', ['Accept' => 'application/json'])
            ->assertStatus(200)
            ->assertJson([
                    "emp_id"    => ["The emp id field is required."],
                    "password"  => ["The password field is required."],
            ]);
    }

    public function testSuccessfulLogin()
    {
        $loginData = [
            'emp_id' => '174438', 
            'password' => 'sample123'
        ];
        $user = User::factory()->create();
        $response = $this->actingAs($user, 'api')->postJson('/api/login', $loginData);
        $response
            ->assertStatus(200)
            ->assertJson([
                'status'        => "success",
                'status_code'   => 200,
                'message'       => "Inserted Successfully",
            ]);
    }
}
