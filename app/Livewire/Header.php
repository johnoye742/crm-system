<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Header extends Component
{
    public $showNav;

    public function mount() {
        $showNav = false;
    }

    public function show() {
        if($this -> showNav) {
            $this -> showNav = false;
        } else {
            $this -> showNav = true;
        }
    }

    public function render()
    {
        return view('livewire.real-estate1-header');
    }

    public function logout() {
        Auth::logout();

        redirect() -> route('login');
    }
}
