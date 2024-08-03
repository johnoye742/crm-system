<?php

namespace App\Livewire\Forms;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;

class SignUpForm extends Form
{
    //
    #[Validate('required|email|max:500')]
    public $email = "";
    #[Validate('required|min:8')]
    public $pwd = "";
    #[Validate('required|min:8')]
    public $pwd2;
    #[Validate('required')]
    public $fname;
    #[Validate('required')]
    public $niche;
    #[Validate('required')]
    public $org_name;
    #[Validate('required')]
    public $dob;
    #[Validate('required')]
    public $gender;

    public function createUser() {
        $this -> validate();

        if($this -> pwd != $this -> pwd) return redirect() -> back() -> withErrors(['password' => 'Passwords do not match.']);

        // Create a new organisation with the organisation name and niche given by the user
        $organisation = Organisation::create([
            'name' => $this -> org_name,
            'niche' => $this -> niche
        ]);

        $value = [
            "email" => $this -> email,
            "password" => Hash::make($this -> pwd),
            "name" => $this -> fname,
            "role" => "Admin",
            "niche" => $this -> niche,
            "organisation_id" => $organisation -> id,
            "dob" => $this -> dob,
            "gender" => $this -> gender
        ];
        // Create new user
        User::create($value);

    }
}
