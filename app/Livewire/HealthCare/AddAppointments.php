<?php

namespace App\Livewire\HealthCare;

use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Add Medical Appointments')]
class AddAppointments extends Component
{
    #[Validate('required')]
    public $patient_id, $scheduled_for, $notes;

    public function add() {
        $this -> validate();

        // Collect data to be inserted into Appointments
        $data = [
            'patient_id' => $this -> patient_id,
            'user_id' => Auth::user() -> id,
            'scheduled_for' => $this -> scheduled_for,
            'info' => $this -> notes
        ];

        // Insert into the PatientAppointments table
        PatientAppointment::insert($data);

    }

    public function render()
    {
        return view('livewire.health-care.add-appointments', [
            'patients' => Auth::user() -> organisation -> patients
        ]);
    }
}
