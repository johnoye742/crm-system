<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    #[Validate('required|email|max:500')]
    public $email;
    #[Validate('required')]
    public $pwd;

    public function login () {
        $this -> validate();

        $values = [
            'email' => $this -> email,
            'password' => $this->pwd
        ];

        if(Auth::attempt($values)) return redirect() -> route('dashboard');
        
    }
    public function render()
    {
        return view('livewire.login');
    }
}
