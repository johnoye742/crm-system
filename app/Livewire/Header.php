<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public function render()
    {
        return view('livewire.header');
    }

    public function logout() {
        Auth::logout();

        redirect() -> route('login');
    }
}
