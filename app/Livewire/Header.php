<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;
use Livewire\Component;

class Header extends Component
{
    public $showNav;
    public $page;

    public function mount() {
        $showNav = false;

        switch (request() -> url()) {
            case route('dashboard'):
                $this -> page = 'dashboard';
                break;

            case route('employees'):
                $this -> page = 'employees';
                break;

            default:
                $this->page = 'dashboard';
                break;
        }
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
        if(request() -> user() -> niche == 'health-care') {
            return view('livewire.health-care.header');
        }
        return view('livewire.real-estate.header');
    }

    public function logout() {
        Auth::logout();

        redirect() -> route('login');
    }
}
