<?php

namespace Tests\Feature;

use App\User;
use App\Officer;
use App\Station;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class OfficerManagementTest extends TestCase
{
    use RefreshDatabase;

    public function setUp():void
    {
        parent::setUp();

        $this->be(factory(User::class)->create());
    }

    /**
     * @test
     * @group officers
     */
    public function admin_can_view_officers()
    {
        $this->withoutExceptionHandling();
         
        $this->get('/admin/officers')
            ->assertOk()
            ->assertViewIs('admin.officers.index')
            ->assertViewHas('officers');
    }

    /**
     * @test
     * @group officers
     */
    public function admin_can_view_create_officer()
    {
        $this->withoutExceptionHandling();
         
        $this->get('/admin/officers/create')
            ->assertOk()
            ->assertViewIs('admin.officers.create')
            ->assertViewHas('stations');
    }

    /**
     * @test
     * @group officers
     */
    public function admin_can_create_an_ocs()
    {
        $this->withoutExceptionHandling();

        $station = factory(Station::class)->create();
        $user = factory(User::class)->make();
         
        $response = $this->post(route('admin.officers.store'), [
            'user' => $user->toArray(),
            'officer' => [
                'station_id' => $station->id,
                'ocs' => true,
                'officer_number' => 1556738,
            ]
        ]);

        $this->assertCount(2, User::all(['id']));
        $this->assertCount(1, Officer::all(['id']));

        $this->assertEquals(2, Officer::first()->user_id);

        $response->assertRedirect(route('admin.officers.index')); 
    }

    /** @group officers */
    public function test_admin_can_view_an_officer_show_page()
    {
        $this->withoutExceptionHandling();

        $officer = factory(Officer::class)->create();

        $response = $this->get(route('admin.officers.show', $officer));

        $response->assertOk();

        $response->assertViewIs('admin.officers.show');

        $response->assertViewHas('officer');
        
    }

    /** @group officers */
    public function test_admin_can_view_an_officer_edit_page()
    {
        $this->withoutExceptionHandling();

        $officer = factory(Officer::class)->create();

        $response = $this->get(route('admin.officers.edit', $officer));

        $response->assertOk();

        $response->assertViewIs('admin.officers.edit');

        $response->assertViewHasAll(['officer', 'stations']);
        
    }

    /** @group officers */
    public function test_admin_can_update_officer()
    {
        $this->withoutExceptionHandling();

        $officer = factory(Officer::class)->create();

        $station = factory(Station::class)->create();
        $userData = factory(User::class)->make()->toArray();

        $response = $this->patch(route('admin.officers.update', $officer), [
            'user' => $userData,
            'officer' => [
                'station_id' => $station->id,
                'ocs' => true,
                'officer_number' => 320,
            ]
        ]);

        $this->assertTrue(Officer::where('officer_number', 320)->exists());

        $this->assertEquals($station->id, $officer->fresh()->station_id);

        $this->assertEquals($userData['name'], $officer->fresh()->user->name);
        $this->assertEquals($userData['email'], $officer->fresh()->user->email);
        $this->assertEquals($userData['phone_number'], $officer->fresh()->user->phone_number);
        
        $response->assertRedirect(route('admin.officers.show', $officer));
        
    }

    /** @group officers */
    public function test_admin_can_delete_an_officer()
    {
        $this->withoutExceptionHandling();

        $officer = factory(Officer::class)->create();

        $response = $this->delete(route('admin.officers.destroy', $officer));

        $this->assertFalse(Officer::where('officer_number', $officer->officer_number)->exists());

        $this->assertEquals(0, Officer::count());

        $response->assertRedirect(route('admin.officers.index'));
        
    }
}
