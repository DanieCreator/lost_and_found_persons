<?php

namespace Tests\Feature\Admin;

use App\Item;
use App\Role;
use App\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ItemsManagementTest extends TestCase
{
    use RefreshDatabase;

    private $user = null;

    public function setUp():void
    {
        parent::setUp();

        $role = Role::firstOrCreate(
            ['title' =>  'admin'],
            ['description' => 'The uttermost role of the system']
        );

        $this->user = factory(User::class)->create([
            'role_id' => $role->id
        ]);

    }

    /**
     * @test
     * 
     * @group items
     */
    public function admin_can_view_available_items()
    {
        $this->withoutExceptionHandling();

        $this->be($this->user);

        $response = $this->get(route('admin.items.index'));

        $response->assertOk();
        $response->assertViewIs('admin.items.index');
        $response->assertViewHas('items');
    }

    /**
     * @test
     * 
     * @group items
     */
    public function admin_can_create_an_item()
    {
        $this->withoutExceptionHandling();
        $this->be($this->user);

        $itemData = factory(Item::class)->make()
            ->toArray();

        $response = $this->post(route('admin.items.store'), $itemData);

        $this->assertCount(1, Item::all());

        $this->assertEquals($itemData['key'], Item::first()->key);

        $this->assertTrue(Item::where('key', $itemData['key'])->exists());

        $response->assertRedirect(route('admin.items.index'));
    }

    /** @group items */
    public function test_admin_can_delete_an_item()
    {
        
        $this->withoutExceptionHandling();

        $this->be($this->user);

        //Create the item to delete
        $item = factory(Item::class)->create();

        $response = $this->delete(route('admin.items.destroy', $item));

        $this->assertEquals(0, Item::count());

        $response->assertRedirect(route('admin.items.index'));
    }

}
