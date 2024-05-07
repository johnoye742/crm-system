<?php

namespace App\Livewire\Forms;

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
    public $role;
    #[Validate('required')]
    public $niche;
    #[Validate('required')]
    public $org;

    public function createUser() {
        $this -> validate();

        if($this -> pwd != $this -> pwd) return redirect() -> back() -> withErrors(['password' => 'Passwords do not match.']);

        Log::debug('organisation '. $this->org);
        $value = [
            "email" => $this -> email,
            "password" => Hash::make($this -> pwd),
            "name" => $this -> fname,
            "role" => $this -> role,
            "niche" => $this -> niche,
            "organisation_id" => $this -> org
        ];

        User::create($value);
    }
}
