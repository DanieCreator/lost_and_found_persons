<?php

namespace Tests\Feature;

use App\User;
use App\Station;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class StationManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp(): void
    {
        parent::setUp();

        $this->be(factory(User::class)->create());

    }

    /**
     * @test
     * 
     * @group station
     */
    public function admin_can_view_stations()
    {
        $this->withoutExceptionHandling();

        $this->get('/admin/stations')
            ->assertOk()
            ->assertViewIs('admin.stations.index')
            ->assertViewHas('stations');
    }


    /**
     * @test
     * 
     * @group station
     */
    public function admin_can_view_add_station_page()
    {
        $this->withoutExceptionHandling();
        
        $this->get('/admin/stations/create')
            ->assertOk()
            ->assertViewIs('admin.stations.create');

    }

    /**
     * @test
     * 
     * @group station
     */
    public function admin_can_add_a_station()
    {
        $this->withoutExceptionHandling();

        $response = $this->post('/admin/stations', $this->data());

        $this->assertCount(1, Station::all(['id']));
            
        $response->assertRedirect('/admin/stations');
    }

    /**
     * @test
     * @group station
     */
    public function station_name_and_location_are_required()
    {

        $response = $this->post('/admin/stations', array_merge(
            $this->data(), [
                'name' => '',
                'location' => '',
            ]
        ));

        $response->assertSessionHasErrors(['name', 'location']);

        $this->assertCount(0, Station::all(['id']));

    }

    /**
     * @test
     * 
     * @group station
     */
    public function lat_and_lng_are_not_required(){

        $this->withoutExceptionHandling();

        $response = $this->post('/admin/stations', array_merge(
            $this->data(),[
                'lat' => '',
                'lng' => '',
            ]
        ));

        $this->assertCount(1, Station::all(['id']));
            
        $response->assertRedirect('/admin/stations');

    }

    /**
     * @test
     * @group station
     */
    public function admin_can_view_single_station_page()
    {
        $this->withoutExceptionHandling();

        $station = Station::create($this->data());

        $this->get($station->path('admin'))
            ->assertOk()
            ->assertViewIs('admin.stations.show')
            ->assertViewHas('station');
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_view_station_edit_page()
    {
        $this->withoutExceptionHandling();

        $station = Station::create($this->data());

        $this->get('/admin/stations/' . $station->id . '/edit')
            ->assertOk()
            ->assertViewIs('admin.stations.edit')
            ->assertViewHas('station');
    }

    /**
     * @test
     * @group station
     */
    public function admin_can_update_station_details()
    {
        $this->withoutExceptionHandling();

        $station = Station::create($this->data());

        $response = $this->patch($station->path('admin'), array_merge(
            $this->data(),[
                'name' => 'New Name',
                'location' => 'New Location',
            ]
        ));

        $this->assertEquals('New Name', $station->fresh()->name);
        $this->assertEquals('New Location', $station->fresh()->location);

        $response->assertRedirect($station->path('admin'));

    }

    /**
     * @test
     * @group station
     */
    public function admin_can_delete_a_station()
    {
        $this->withoutExceptionHandling();

        $station = Station::create($this->data());

        $response = $this->delete($station->path('admin'));

        $this->assertCount(0, Station::all());

        $response->assertRedirect('/admin/stations');

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
