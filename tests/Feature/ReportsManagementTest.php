<?php

namespace Tests\Feature;

use App\Report;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportsManagementTest extends TestCase
{
    use RefreshDatabase;
    
    /** @group reports */
    public function test_a_guest_can_search_for_lost_person()
    {
        $this->withoutExceptionHandling();

        factory(Report::class, 5)->create();

        $response = $this->get(route('reports.index'));

        $response->assertOk();

        $response->assertViewIs('reports.index');

        $response->assertViewHas('reports');
    }

    /** @group reports */
    public function a_guest_can_visit_the_report_show_page()
    {
        $this->withoutExceptionHandling();

        $report = factory(Report::class)->create();

        $response = $this->get(route('reports.show', $report));

        $response->assertOk();

        $response->assertViewIs('reports.show');

        $response->assertViewHas('report');
        
    }
}
