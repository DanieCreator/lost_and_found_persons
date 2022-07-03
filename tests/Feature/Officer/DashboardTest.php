<?php

namespace Tests\Feature\Officer;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    private $user = null;

    public function setUp():void
    {
        parent::setUp();

    }

    /**
     * @test
     * 
     * @group dashboard
     */
    public function officer_can_visit_dashboard()
    {

        $this->withoutExceptionHandling();

        $role = Role::firstOrCreate(
            ['title' =>  'officer'],
            ['description' => 'Somehow a better role, but not that powerfull']
        );

        $this->be($this->user = factory(User::class)->create([
            'role_id' => $role->id
        ]));

        $response = $this->get('/officer/dashboard');

        $response->assertOk();

        $response->assertViewIs('officer.dashboard');
    }

    /**
     * @test
     * 
     * @group dashboard
     */
    public function regular_user_is_blocked_when_tries_accessing_officer_dashboard()
    {
        $this->withoutExceptionHandling();
        
        //Arrange
        $this->expectException(AuthorizationException::class);

        $this->be($this->user = factory(User::class)->create());

        //Act
        $response = $this->get('/officer/dashboard');
    }
}
