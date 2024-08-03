<?php

namespace App\Livewire;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Add Patient - Health Care')]
class AddPatient extends Component
{
    #[Validate('required')]
    public $pname, $gender, $dob, $occupation, $emergency_contact, $phone, $address, $state, $password;
    #[Validate('required|email')]
    public $email;

    public function mount() {
        // Initialise gender as male by default
        $this -> gender = 'male';
    }

    public function add() {
        // Validate user inputs
        $this -> validate();

        // Initialize some variables here for code simplicity
        $emergency_contact = $this -> emergency_contact;

        // Collect the data to be inserted
        $data = [
            'name' => $this -> pname,
            'gender' => $this -> gender,
            'dob' => $this -> dob,
            'emergency_contact' => $emergency_contact,
            'organisation_id' => auth() -> user() -> organisation_id,
            'address' => $this -> address,
            'phone' => $this -> phone,
            'password' => Hash::make($this -> password),
            'email' => $this -> email,
            'state_of_origin' => $this -> state,
            'role' => "health-care-patient",
            'niche' => 'health-care',
            'organisation_id' => Auth::user() -> organisation_id,
            'occupation' => $this -> occupation
        ];

        // Add patient as user to allow them access their info
        User::create($data);

        // redirect user to the dashboard
        return redirect() -> route('dashboard');
    }
    public function render()
    {
        return view('livewire.health-care.add-patient');
    }
}
