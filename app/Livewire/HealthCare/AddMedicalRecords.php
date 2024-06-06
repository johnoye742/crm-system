<?php

namespace App\Livewire\HealthCare;

use App\Models\MedicalRecord;
use App\Models\PatientAppointment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;
#[Title('Add Medical Record')]
class AddMedicalRecords extends Component
{
    #[Validate('required|max:500')]
    public $visit_reason, $diagnosis, $treatment, $prescriptions, $notes;
    #[Validate('required|date')]
    public $follow_up_date;
    #[Validate('required')]
    public $patient_id;

    public $appointment_check;

    public function render()
    {
        Gate::authorize('add-medical-records');
        
        $patients = Auth::user() -> organisation -> patients;

        return view('livewire.health-care.add-medical-records', ['patients' => $patients]);
    }

    public function add() {
        // Validate the user inputs
        $this -> validate();       
        // collect the inputs to be added to the db
        $data = [
            'patient_id' => $this -> patient_id,
            // Note: only doctors should be able to add records so set policy for that
            'user_id' => Auth::user() -> id,
            'visit_reason' => $this -> visit_reason,
            'diagnosis' => $this -> diagnosis,
            'treatment' => $this -> treatment,
            'prescription' => $this -> prescriptions,
            'visit_date' => date('Y-m-d'),
            'follow_up_date' => $this -> follow_up_date,
            'notes' => $this -> notes
        ];

        // Insert the data into the MedicalRecords table
        MedicalRecord::insert($data);

        // Add appointment if user checks the appointment checkbox
        if($this -> appointment_check) {
            PatientAppointment::insert([
                'user_id' => Auth::user() -> id,
                'patient_id' => $this -> patient_id,
                'scheduled_for' => $this -> follow_up_date,
                'info' => $this -> notes
            ]);
        }

        // Redirect to the dashboard
        return redirect() -> route('dashboard');
    }
}
