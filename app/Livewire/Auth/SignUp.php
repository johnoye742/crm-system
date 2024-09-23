<?php

namespace App\Livewire\Auth;

use App\Livewire\Forms\SignUpForm;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Sign Up')]
class SignUp extends Component
{
    public SignUpForm $form;


    public function signUp () {
        $this -> form -> createUser();
        return redirect() -> route('login');
    }

    public function render()
    {
        return view('livewire.auth.sign-up');
    }
}
