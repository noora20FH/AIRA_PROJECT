<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductData extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    private $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    private function createUser()
    {
        return User::factory()->create();
    }

    public function testDatabase()
    {
        // Make call to application...
    
        $this->seeInDatabase('users', ['role_as' => 1]);
    }


    public function test_example()
    {
        $admin = User::factory()->create(["role_as"=> 1]);


        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
