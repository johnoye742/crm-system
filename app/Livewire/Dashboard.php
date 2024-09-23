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
    public function render()
    {
        $orgs = Auth::user() -> organisations;
        if($orgs != null) {
            foreach ($orgs as $org) {
                array_push($this -> organisations, Organisation::find($org));
            }
        }
        Log::debug($this -> organisations);
        return view('livewire.dashboard');
    }
}
