<?php

namespace Tests\Feature;

use App\Role;
use App\User;
use App\Permission;
use Tests\TestCase;
use Illuminate\Support\Facades\DB;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AdminRolesManagementTest extends TestCase
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
     * @group roles
     */
    public function admin_can_view_all_roles()
    {
        //$this->withoutExceptionHandling();

        $response = $this->get('/admin/roles');

        $response->assertOk();

        $response->assertViewIs('admin.roles.index');

        $response->assertViewHas('roles');
    }

    /**
     * @test
     * 
     * @group roles
     */
    public function admin_can_view_create_role_page()
    {
        //$this->withoutExceptionHandling();

        $response = $this->get('/admin/roles/create');

        $response->assertOk();

        $response->assertViewIs('admin.roles.create');

        $response->assertViewHas('permissions');

    }

    /**
     * @test
     * 
     * @group roles
     */
    public function admin_can_create_a_role()
    {
        //$this->withoutExceptionHandling();
        //Arrange
        $roleData = factory(Role::class)->make()->toArray();

        //Perminssions should already be created during the add time
        $permissionsData = factory(Permission::class, 3)->create()->pluck('id')->toArray();

        //Act
        $response = $this->post('/admin/roles', array_merge($roleData, [
            'permissions' => $permissionsData
        ]));

        //Assert
        $this->assertCount(2, Role::all());
        $this->assertCount(3, Role::findOrFail(2)->permissions);

        $this->assertEquals($roleData['title'], Role::findOrFail(2)->title);
        $this->assertEquals($roleData['description'], Role::findOrFail(2)->description);

        $response->assertRedirect('/admin/roles');

    }

    /**
     * @test
     * 
     * @group roles
     */
    public function admin_can_view_edit_role_page()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 3)->create();
        $role->permissions()->attach($permissions);

        //Act
        $response = $this->get('/admin/roles/' . $role->id . '/edit');

        //Assert
        $response->assertOk();

        $response->assertViewIs('admin.roles.edit');

        $response->assertViewHasAll(['role', 'permissions']);

    }

    /**
     * @test
     * 
     * @group roles
     */
    public function admin_can_update_a_role()
    {
        //$this->withoutExceptionHandling();

        //Arrange
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 3)->create();
        $role->permissions()->attach($permissions);

        //Create new permissions and get new role data
        $permissionsData = factory(Permission::class, 2)->create()->pluck('id')->toArray();
        $roleData = factory(Role::class)->make()->toArray();


        //Act
        $response = $this->patch('/admin/roles/' . $role->id, array_merge(
            $roleData,[
                'permissions' => $permissionsData
            ]
        ));

        //Assert
        $this->assertCount(2, Role::all());
        $this->assertCount(2, Role::findOrFail(2)->permissions);

        $this->assertEquals($roleData['title'], Role::findOrFail(2)->title);
        $this->assertEquals($roleData['description'], Role::findOrFail(2)->description);

        $response->assertRedirect('/admin/roles');
    }

    /**
     * @test
     * 
     * @group roles
     */
    public function admin_can_delete_a_role()
    {
        $this->withoutExceptionHandling();

        //Arrange
        $role = factory(Role::class)->create();
        $permissions = factory(Permission::class, 3)->create();
        $role->permissions()->attach($permissions);

        //Act
        $response = $this->delete('/admin/roles/' . $role->id);

        //Assert
        $this->assertCount(1, Role::all());
        $this->assertCount(3, Permission::all());
        $this->assertCount(0, DB::table('permission_role')->get());

        $response->assertRedirect('/admin/roles');

    }
}
