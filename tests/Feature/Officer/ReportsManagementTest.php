<?php

namespace Tests\Feature\Officer;

use App\Role;
use App\User;
use App\Report;
use App\Officer;
use Tests\TestCase;
use Livewire\Livewire;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportsManagementTest extends TestCase
{
    use RefreshDatabase;

    private $role = null;
    private $user = null;


    public function setUp():void
    {
        parent::setUp();

        $officer = factory(Officer::class)->create();

        $this->user = $officer->user;
    }

    /**
     * @test
     * 
     * @group reports
     */
    public function officer_can_view_reports_page()
    {
        $this->withoutExceptionHandling();
        $this->be($this->user);

        $response = $this->get(route('officer.reports.index'));

        $response->assertOk();
        $response->assertViewIs('officer.reports.index');
        $response->assertViewHas('reports');
    }

    /**
     * @test
     * 
     * @group reports
     */
    public function officer_can_view_create_report_page()
    {
        $this->withoutExceptionHandling();
        $this->be($this->user);

        $response = $this->get(route('officer.reports.create'));

        //Assertions
        $response->assertOk();
        $response->assertViewIs('officer.reports.create');
        $response->assertViewHas('users');

    }
    
    /**
     * @test
     * 
     * @group reports
     */
    public function officer_can_create_a_report()
    {
        //$this->withoutExceptionHandling();

        $this->be($this->user);

        $reportData = factory(Report::class)->make()->toArray();

        $keys = array();
        $values = array();

        //Browser desing key and values
        foreach ($reportData['extra_items'] as $key => $value) {
            $keys[] = $key;
            $values[] = $value;
        }

        unset($reportData['extra_items']);
        
        $reportData['keys'] = $keys;
        $reportData['values'] = $values;
        
        array_values($reportData);

        $observers = factory(User::class, 3)->create()->pluck('id')->toArray();
        

        $response = $this->post(route('officer.reports.store'), array_merge(
            $reportData, [
                'observers' => $observers
            ]
        ));
        
        $this->assertTrue(Report::where('person_name', $reportData['person_name'])->exists());

        $report = Report::where('person_name', $reportData['person_name'])->first();

        $this->assertCount(3, $report->users);

        $this->assertEquals($reportData['person_name'], $report->person_name);
        $this->assertEquals($reportData['person_national_identification_number'], $report->person_national_identification_number);
        $this->assertEquals($reportData['person_birth_certificate_number'], $report->person_birth_certificate_number);
        $this->assertEquals($reportData['person_phone_number'], $report->person_phone_number);
        $this->assertEquals($reportData['person_date_of_birth'], $report->person_date_of_birth);

        $this->assertTrue(array_key_exists('mood', json_decode($report->extra_items, true)));
        
        $this->assertFalse(boolval($report->solved));

        $response->assertRedirect(route('officer.reports.index'));
    }

    /** @group reports */
    public function officer_can_view_a_single_report_show_page()
    {
        $this->withoutExceptionHandling();

        $this->be($this->user);

        $report = factory(Report::class)->create();

        $response = $this->get(route('officer.reports.show', $report));

        $response->assertOk();

        $response->assertViewIs('officer.reports.show');

        $response->assertViewHas('report');
        
    }

    /** @group reports */
    public function test_officer_can_see_report_edit_page()
    {
        $this->withoutExceptionHandling();

        $this->be($this->user);

        $report = factory(Report::class)->create();

        $response = $this->get(route('officer.reports.edit', $report));

        $response->assertOk();

        $response->assertViewIs('officer.reports.edit');

        $response->assertViewHas('report');

        $response->assertSeeLivewire('reports.person-details');
    }

    /** @group reports */
    public function report_personal_details_can_be_updated()
    {
        $this->withoutExceptionHandling();

        $this->be($this->user);

        $report = factory(Report::class)->create();

        Livewire::test(PersonDetails::class, $report)
            ->set('person_name', 'Jane Doe')
            ->update('update', $report);
        
        $this->assertTrue(Report::where('person_name', 'Jane Doe')->exists());
    }
}
