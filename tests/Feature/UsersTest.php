<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UsersTest extends TestCase
{
    public function testRequiredFieldsForRegistration()
    {
        $this->json('POST', 'api/register', ['Accept' => 'application/json'])
            ->assertStatus(400)
            ->assertJson([
                "status"        => "warning",
                "status_code"   => 400,
                "message"       => "Validation Errors",
                "error"         => [
                    "emp_id"    => ["The emp id field is required."],
                    "password"  => ["The password field is required."],
                ]
            ]);
    }
}
