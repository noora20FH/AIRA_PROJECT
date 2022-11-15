<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;



class CreateCustomerData extends TestCase
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

    public function test_create_customer_data(){
        $response = $this->actingAs($this->user)->get('/customerData');
        $response->assertStatus(200);
       
        $response->assertSeeText('Name');
        $response->assertSeeText('Phone');
        $response->assertSeeText('Email');
        $response->assertSeeText('Address');
        $response->assertSeeText('Postal Code');
        $response->assertSeeText('Action');
    }
    public function test_store_new_customer()
    {
        $response = $this->actingAs($this->user)->post('customerData/store',[
            'name' => 'Anna',
            'phone' => '089377455532',
            'email' => 'anna@gmail.com',
            'address' => 'Jl. Ijen',
            'postal_code' => '6473'

        ]);

        $response->assertRedirect('customerData/store');
        $this->assertCount(1, User::all());

        $this->assertDatabaseHas('users',[
            'name' => 'Anna',
            'phone' => '089377455532',
            'email' => 'anna@gmail.com',
            'address' => 'Jl. Ijen',
            'postal_code' => '6473'
        ]);
        $response->assertSessionHasNoErrors();
    }

}
