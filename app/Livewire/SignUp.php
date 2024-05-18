<?php

namespace App\Livewire;

use App\Livewire\Forms\SignUpForm;
use App\Models\Organisation;
use Illuminate\Support\Facades\Log;
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
        return view('livewire.sign-up', ['organizations' => Organisation::all()]);
    }
}
