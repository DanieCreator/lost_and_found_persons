<?php

namespace Tests\Feature\Admin;

use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Foundation\Testing\RefreshDatabase;

class DashboardTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @group dashboard
     */
    public function admin_can_visit_admin_dashboard()
    {

        $this->withoutExceptionHandling();

        $role = Role::firstOrCreate(
            ['title' =>  'admin'],
            ['description' => 'The uttermost role on the system']
        );

        $this->be($this->user = factory(User::class)->create([
            'role_id' => $role->id
        ]));

        $response = $this->get('/admin/dashboard');

        $response->assertOk();

        $response->assertViewIs('admin.dashboard');

        $response->assertViewHas('tally');
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
        $response = $this->get('/admin/dashboard');
    }    

    /**
     * @test
     * 
     * @group dashboard
     */
    public function officer_is_blocked_when_tries_accessing_admin_dashboard()
    {
        $this->withoutExceptionHandling();
        
        //Arrange
        $this->expectException(AuthorizationException::class);

        $role = Role::firstOrCreate(
            ['title' =>  'officer'],
            ['description' => 'Somehow a better role, but not that powerfull']
        );

        $this->be($this->user = factory(User::class)->create([
            'role_id' => $role->id
        ]));

        //Act
        $response = $this->get('/admin/dashboard');
    }   

}
