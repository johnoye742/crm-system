<?php

namespace App\Livewire\HealthCare;

use App\Models\PatientAppointment;
use Livewire\Component;

class EditAppointment extends Component
{
    public $id;

    public function render()
    {
        return view('livewire.health-care.edit-appointment', [
            'patient' => PatientAppointment::find($this -> id) -> patient
        ]);
    }
}
