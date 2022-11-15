<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use App\Models\Tag;

class EditCustomerData extends TestCase
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

    public function test_admin_see_customer_data(){
        $user = User::factory()->create();
        $response= $this->actingAs($this->user)->get('/customerData/edit/'.$user->slug);#$id pada DB user ditulis seperti apa URL:customerData/edit/{id}
        $response->asserStatus(200);
        $response->assertSeeText('Update Customer Data');
        $response->assertSeeText('Name');
        $response->assertSee($user->name);
        $response->assertSeeText('Phone');
        $response->assertSee($user->phone);
        $response->assertSeeText('Email');
        $response->assertSee($user->email);
        $response->assertSeeText('Address');
        $response->assertSee($user->address);
        $response->assertSeeText('Postal Code');
        $response->assertSee($user->postal_code);
        
    }
}
