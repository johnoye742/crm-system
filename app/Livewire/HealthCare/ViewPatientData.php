<?php

namespace App\Livewire\HealthCare;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ViewPatientData extends Component
{
    public $patient;

    public function mount(User $user, Patient $patient) {
        
    }

    public function render()
    {
        $patient = $this -> patient;
        return view('livewire.health-care.view-patient-data', [
            "patient" => $patient,
            "emergency_contact" => json_decode(str_replace(" ", "", $patient -> emergency_contact), true),
            "medical_record" => $patient -> records
        ]) -> title("View Patient - ". $patient -> name);
    }

    public function decode(String $json) : array {
        return json_decode($json, true);
    }
}
