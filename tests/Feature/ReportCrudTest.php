<?php

namespace Tests\Feature;

use App\Report;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ReportCrudTest extends TestCase
{
    use RefreshDatabase;

    /** @group reports */
    public function test_a_report_can_be_created()
    {
        $this->withoutExceptionHandling();

        $reportData = factory(Report::class)->make()->toArray();

        $reportData['extra_items'] = json_encode($reportData['extra_items']);

        Report::create($reportData);

        $this->assertTrue(Report::where('person_name', $reportData['person_name'])->exists());

        $report = Report::where('person_name', $reportData['person_name'])->first();
        
        $this->assertEquals($reportData['officer_id'], $report->officer_id);
        $this->assertEquals($reportData['station_id'], $report->station_id);
        $this->assertEquals($reportData['person_name'], $report->person_name);
        $this->assertEquals($reportData['person_national_identification_number'], $report->person_national_identification_number);
        $this->assertEquals($reportData['person_birth_certificate_number'], $report->person_birth_certificate_number);
        $this->assertEquals($reportData['person_phone_number'], $report->person_phone_number);
        $this->assertEquals($reportData['person_date_of_birth'], $report->person_date_of_birth);

        $this->assertTrue(array_key_exists('mood', json_decode($report->extra_items, true)));
        
        $this->assertFalse(boolval($report->solved));
        
    }
}
