<?php

namespace Tests\Unit;

use App\Role;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class RoleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @group roles
     */
    public function a_role_can_be_created()
    {
        $role = Role::create([
            'title' => 'Admin',
            'description' => 'The uttermost role'
        ]);

        $this->assertCount(1, Role::all());

        $this->assertEquals('Admin', Role::first()->title);
        $this->assertEquals('The uttermost role', Role::first()->description);
    }

    /**
     * @test
     * 
     * @group roles
     */
    public function role_title_is_required()
    {
        $this->expectException(\Exception::class);

        factory(Role::class)->create([
            'title' => null,
        ]);
    }

    public function role_description_is_required()
    {
        $this->expectException(\Exception::class);

        factory(Role::class)->create([
            'description' => null,
        ]);
    }
    
}
