<?php

namespace Tests\Unit;

use App\Role;
use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionRoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @group role-permission
     */
    public function role_and_permissions_can_be_linked()
    {
        //Arrange
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 3)->create();

        //Act
        $role->permissions()->attach($permissions);

        //Assert
        $this->assertCount(3, $role->fresh()->permissions);

    }
}
