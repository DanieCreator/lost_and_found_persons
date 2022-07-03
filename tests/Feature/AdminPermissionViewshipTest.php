<?php

namespace Tests\Feature;

use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminPermissionViewshipTest extends TestCase
{
    use RefreshDatabase;

    private $user = null;

    public function setUp():void
    {
        parent::setUp();

        $this->user = factory(User::class)->create();

        $this->be($this->user);
    }

    /**
     * @test
     * 
     * @group permissions
     */
    public function admin_can_view_all_permission()
    {
        $this->withoutExceptionHandling();

        //Arrange

        //Act
        $response = $this->get('/admin/permissions');

        //Asert
        $response->assertOk();

        $response->assertViewIs('admin.permissions.index');

        $response->assertViewHas('permissions');
    }

}
