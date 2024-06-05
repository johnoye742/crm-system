<?php

namespace App\Livewire;

use App\Models\Patient;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Add Patient - Health Care')]
class AddPatient extends Component
{
    #[Validate('required')]
    public $pname, $gender, $dob, $emergency_contact, $insurance_info;
    
    public function add() {
        // Validate user inputs
        $this -> validate();

        // Initialize some variables here for code simplicity
        $emergency_contact = $this -> emergency_contact;
        $insurance_info = $this -> insurance_info;

        // Collect the data to be inserted
        $data = [
            'name' => $this -> pname,
            'gender' => $this -> gender,
            'dob' => $this -> dob,
            'emergency_contact' => json_encode("{ 'phone' : '$emergency_contact' }"),
            'insurance_info' => json_encode("{ 'info' : '$insurance_info' }"),
            'organisation_id' => auth() -> user() -> organisation_id
        ];

        // Insert into patients table
        Patient::insert($data);

        // redirect user to the dashboard
        return redirect() -> route('dashboard');
    }
    public function render()
    {
        return view('livewire.add-patient');
    }
}
