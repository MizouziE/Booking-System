<?php

namespace Tests\Unit;

use App\Models\Service;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ServiceTest extends TestCase
{
    use RefreshDatabase, WithFaker;
    /**
     * A basic unit test example.
     * @test
     * @return void
     */
    public function test_it_has_a_path()
    {
        $service = Service::factory()->create();

        $this->assertEquals('/services/' . $service->id, $service->path());
    }
}
