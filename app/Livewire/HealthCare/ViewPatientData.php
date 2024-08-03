<?php

namespace App\Livewire\HealthCare;

use App\Models\Patient;
use App\Models\User;
use Illuminate\View\View;
use Livewire\Component;

class ViewPatientData extends Component
{
    public $patient;

    public function mount(User $user, User $patient) {

    }

    public function render() : View
    {
        $patient = $this -> patient;
        return view('livewire.health-care.view-patient-data', [
            "patient" => $patient,
            "emergency_contact" =>  $patient -> emergency_contact,
            "medical_record" => $patient -> records() -> orderBy('id', 'DESC') -> get()
        ]) -> title("View Patient - ". $patient -> name);
    }

    public function decode(String $json) : array {
        return json_decode($json, true);
    }
}
