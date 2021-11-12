<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AdminTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_an_admin_can_create_a_service()
    {
        $this->withoutExceptionHandling();

        $serviceDetails = [
            'name' => $this->faker->word(),
            'description' => $this->faker->sentence(),
            'price' => '5000'
        ];

        $this->post('/services', $serviceDetails)->assertRedirect('/services');

        $this->assertDatabaseHas('services', $serviceDetails);

        $this->get('/services')->assertSee($serviceDetails['name']);
    }

    /** @test */
    public function test_a_service_requires_a_name()
    {
        $this->post('/services', [])->assertSessionHasErrors('name');
    }

    /** @test */
    public function test_a_service_requires_a_description()
    {
        $this->post('/services', [])->assertSessionHasErrors('description');
    }
}
