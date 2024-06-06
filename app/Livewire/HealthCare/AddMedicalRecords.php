<?php

namespace App\Livewire\HealthCare;

use App\Models\MedicalRecord;
use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
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

    public function render()
    {
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

        // Redirect to the dashboard
        return redirect() -> route('dashboard');
    }
}
