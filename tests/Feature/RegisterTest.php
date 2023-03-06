<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegisterTest extends TestCase
{

    private $email;
    protected function setUp(): void
    {
        parent::setUp();

        $this->email = "test@mail.com";
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_register()
    {

        $data = [
            "name" => "Full Name",
            "email" => $this->email,
            "password" => "password",
            "password_confirmation" => "password"
        ];

        $response = $this->post('/register', $data);

        $user = User::where('email', $data['email'])->first();

        $this->assertEquals($data['name'], $user->name);
    }
}
