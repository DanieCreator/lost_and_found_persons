<?php

namespace Tests\Unit;

use App\Station;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * @group station
     */
    public function a_station_can_be_saved()
    {
        Station::create($this->data());

        $this->assertCount(1, Station::all());
        $this->assertEquals('Gisambai', Station::first()->name);
    }

    /**
     * @test
     * @group station
     */
    public function station_name_is_required()
    {
        $this->expectException(\Exception::class);

        Station::create(array_merge($this->data(), ['name' => null]));
    }

    /**
     * @test
     * @group station
     */
    public function station_location_is_required()
    {
        $this->expectException(\Exception::class);

        Station::create(array_merge($this->data(), ['location' => null]));
    }  

    /**
     * @test
     * @group station
     */
    public function station_position_is_not_required()
    {
        Station::create(array_merge(
            $this->data(),[
                'lat' => null,
                'lng' => null,
            ]
        ));

        $this->assertCount(1, Station::all(['id']));
    }

    private function data(): array
    {
        return [
            'name' => 'Gisambai',
            'location' => 'Gisambai, Kenya',
            'lat' => 0.57,
            'lng' => 42.57,
        ];
    }
}
