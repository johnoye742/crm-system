<?php

namespace App\Livewire;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
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

            case route('health-care.patients'):
                $this -> page = 'patients';
                break;

            case route('real-estate.properties'):
                $this -> page = 'properties';
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
        $current_org = Organisation::find(Auth::user() -> current_organisation);
        Log::debug($current_org);
        if($current_org -> niche == 'health-care') {
            return view('livewire.health-care.header', ['page' => $this -> page]);
        }
        if($current_org -> niche == 'real-estate') return view('livewire.real-estate.header');
        return view('livewire.header');
    }

    public function logout() {
        Auth::logout();

        redirect() -> route('login');
    }
}
