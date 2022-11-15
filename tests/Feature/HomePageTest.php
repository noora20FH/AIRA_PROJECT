<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomePageTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);//ensure to make the page opened
        $response->assertSeeText("Home");
        $response->assertSeeText("Shop");
        $response->assertSeeText("Wishlist");
        $response->assertSeeText("Cart");
        $response->assertSeeText("Checkout");
        $response->assertSeeText("Order");
        
       
    }

}
