<?php

namespace Tests\Unit;

use App\Permission;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class PermissionTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     * 
     * @group permission
     */
    public function a_permission_can_be_created()
    {
        Permission::create([
            'title' => 'officers-create',
        ]);

        $this->assertCount(1, Permission::all());

        $this->assertEquals('officers-create', Permission::first()->title);
    }

    /**
     * @test
     * 
     * @group permission
     */
    public function permission_title_is_required()
    {
        $this->expectException(\Exception::class);

        factory(Permission::class)->create([
            'title' => null,
        ]);
    }    

    
}
