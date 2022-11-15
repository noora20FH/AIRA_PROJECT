<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class DeleteCustomerData extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    use RefreshDatabase;
    protected function setUp(): void
    {
        parent::setUp();
        $this->user = $this->createUser();
    }

    public function createUser(){
        return User::factory()->create(["role_as"=> 1]);
    }
    public function test_admin_delete_customer()
    {
        $user= User::factory()->create();
        $this->asssertEquals(1,User::count());
        $response = $this->actingAs($this->user)->delete('/customerData/destroy/'.$user->slug);
        $response->assertStatus(302);
        $this->asserEquals(0, User::count());
    }

}
