<?php

namespace Tests\Feature;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServicesTest extends TestCase
{
    use WithFaker, RefreshDatabase;

    /**
     * A basic feature test example.
     * @test
     * @return void
     */
    public function test_an_admin_can_create_a_service()
    {
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
        $service = Service::factory()->raw(['name' => '']);

        $this->post('/services', $service)->assertSessionHasErrors('name');
    }

    /** @test */
    public function test_a_service_requires_a_description()
    {
        $service = Service::factory()->raw(['description' => '']);

        $this->post('/services', $service)->assertSessionHasErrors('description');
    }

    /** @test */
    public function test_an_admin_can_view_a_service()
    {
        $service = Service::factory()->create();

        $this->get($service->path())
            ->assertSee($service->name)
            ->assertSee($service->description);
    }

    /** @test */
    public function test_a_service_requires_a_provider()
    {
        $service = Service::factory()->raw();

        $this->post('/services', $service)->assertSessionHasErrors('provider');
    }
}
