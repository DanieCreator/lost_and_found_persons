<?php

namespace App\Http\Livewire\Reports;

use App\Report;
use Livewire\Component;

class PersonDetails extends Component
{
    public $person_name;
    public $person_national_identification_number;
    public $person_birth_certificate_number;
    public $person_passport_number;
    public $person_phone_number;
    public $person_date_of_birth;

    public $report;
    
    public function mount(Report $report)
    {
        $this->report = $report;

        $this->person_name = $report->person_name;
        $this->person_national_identification_number = $report->person_national_identification_number;
        $this->person_birth_certificate_number = $report->person_birth_certificate_number;
        $this->person_passport_number = $report->person_passport_number;
        $this->person_phone_number = $report->person_phone_number;
        $this->person_date_of_birth = $report->person_date_of_birth;        
    }

    public function render()
    {
        return view('livewire.reports.person-details');
    }

    /**
     * Person details validations rules
     * 
     * @return array of the details validation
     */
    protected function rules()
    {
        return [
            'person_name' => ['bail', 'required', 'max:255'],
            'person_national_identification_number' => ['bail', 'nullable'],
            'person_birth_certificate_number' => ['bail', 'nullable'],
            'person_passport_number' => ['bail', 'nullable'],
            'person_phone_number' => ['bail', 'nullable'],
            'person_date_of_birth' => ['bail', 'nullable'],
        ];
    }

    /**
     * Update only the person details of the report
     * 
     * @param Report $report, the report in question
     */
    public function update()
    {
        $data  = $this->validate();

        $this->report->update($data);
    }
}
