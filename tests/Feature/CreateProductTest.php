<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;


class CreateProductTest extends TestCase
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

    public function test_customer_data_page(){
        $response = $this->actingAs($this->user)->get('/customerData');
        $response->assertStatus(200);
       
        $response->assertSeeText('Name');
        $response->assertSeeText('Phone');
        $response->assertSeeText('Email');
        $response->assertSeeText('Address');
        $response->assertSeeText('Postal Code');
        $response->assertSeeText('Action');
    }

//     public function test_store_new_customer()
//     {
//         $response = $this->actingAs($this->user)->post('/customerData/create',[
//             'name' => 'Anna',
//             'phone' => '089377455532',
//             'email' => 'anna@gmail.com',
//             'address' => 'Jl. Ijen',
//             'postal_code' => '6473'

//         ]);

//         $response->assertRedirect('/customerData/create');
//         $this->assertCount(1, Tag::all());

//         $this->assertDatabaseHas('tags',[
//             'name' => 'Anna',
//             'phone' => '089377455532',
//             'email' => 'anna@gmail.com',
//             'address' => 'Jl. Ijen',
//             'postal_code' => '6473'
//         ]);
//         $response->assertSessionHasNoErrors();
//     }
}

//env.testing -> DB nya tetap testing. Sedangkan di .env DB nya local
//link URl sesuai dengan yg tertera pada web browser, tidak bergantung routes