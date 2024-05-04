<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Login')]
class Login extends Component
{
    public $email;
    public $pwd;

    public function login () {

    }
    public function render()
    {
        return view('livewire.login');
    }
}
