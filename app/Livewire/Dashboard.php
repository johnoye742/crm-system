<?php

namespace App\Livewire;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public $organisations = [];
    public $current_org;
    public function mount() {

        $this -> organisations = Auth::user() -> organisations;
        Log::debug($this -> organisations);
        $this -> current_org = Organisation::find(Auth::user() -> current_organisation);
    }
    public function render()
    {
        return view('livewire.dashboard');
    }
}
