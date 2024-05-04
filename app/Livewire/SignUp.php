<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Sign Up')]
class SignUp extends Component
{
    public $email = "";
    public $pwd = "";
    public $pwd2;
    public $fname;

    public function signUp () {
        
    }

    public function render()
    {
        return view('livewire.sign-up');
    }
}
