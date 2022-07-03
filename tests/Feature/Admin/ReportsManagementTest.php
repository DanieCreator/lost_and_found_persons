<?php

namespace Tests\Feature\Admin;

use App\Role;
use App\User;
use App\Report;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportsManagementTest extends TestCase
{
    use RefreshDatabase;
    
    public function setUp() : void
    {
        parent::setUp();

        $role = Role::firstOrCreate(
            ['title' =>  'admin'],
            ['description' => 'The uttermost role on the system']
        );

        $this->actingAs($this->user = factory(User::class)->create([
            'role_id' => $role->id
        ]));
        
    }

    /** @group reports */
    public function test_admin_can_view_all_reports()
    {
        $this->withoutExceptionHandling();

        $response = $this->get(route('admin.reports.index'));

        $response->assertOk();

        $response->assertViewIs('admin.reports.index');

        $response->assertViewHas('reports');
    }

    /** @group reports */
    public function admin_can_view_a_single_report()
    {
        $this->withoutExceptionHandling();

        $report = factory(Report::class)->create();

        $response = $this->get(route('admin.reports.show', $report));

        $response->assertOk();

        $response->assertViewIs('admin.reports.show');

        $response->assertViewHas('report');
        
    }

    /** @group reports */
    public function test_admin_can_delete_a_report()
    {
        $this->withoutExceptionHandling();

        $report = factory(Report::class)->create();

        $response = $this->delete(route('admin.reports.destroy', $report));

        $this->assertEquals(0, Report::count());

        $response->assertRedirect(route('admin.reports.index'));

    }

    /** @group reports */
    public function test_admin_can_edit_report_and_change_whether_solved()
    {
        $this->withoutExceptionHandling();

        $report = factory(Report::class)->create();

        $response = $this->get(route('admin.reports.edit', $report));

        $response->assertOk();

        $response->assertViewIs('admin.reports.edit');

        $response->assertViewHas('report');
        
    }

    /** @group reports */
    public function test_a_report_can_be_marked_solved_by_the_admin()
    {
        $this->withoutExceptionHandling();

        $report = factory(Report::class)->create();

        $response = $this->patch(route('admin.reports.update', $report), [
            'solved' => true
        ]);
        
        $this->assertTrue(boolval($report->fresh()->solved));

        $response->assertRedirect(route('admin.reports.show', $report));
    }

}
