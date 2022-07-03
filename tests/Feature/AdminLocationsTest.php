<?php

namespace Tests\Feature;

use App\User;
use App\Station;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminLocationsTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->be(factory(User::class)->create());
    }

    /**
     * @test
     * 
     * @group locations
     */
    public function admin_can_view_locations(){

        //Arrange
        $this->withoutExceptionHandling();

        //Create a station
        factory(Station::class)->create();

        //Act
        $response = $this->get('/admin/locations');

        //Assert
        $response->assertOk();
        $response->assertViewIs('admin.locations.index');
        $response->assertViewHas('locations');
    }
}
