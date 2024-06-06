<?php

namespace App\Livewire\HealthCare;

use App\Models\Patient;
use Livewire\Component;

class ViewPatientData extends Component
{
    public $id;

    public function render()
    {
        $patient = Patient::find($this -> id);
        return view('livewire.health-care.view-patient-data', [
            "patient" => $patient,
            "emergency_contact" => json_decode(str_replace(" ", "", $patient -> emergency_contact), true),
            "medical_record" => $patient -> records
        ]);
    }

    public function decode(String $json) : array {
        return json_decode($json, true);
    }
}
