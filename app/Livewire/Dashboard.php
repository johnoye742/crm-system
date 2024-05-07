<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\Property;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $properties = Organisation::find(Auth::user() -> organisation_id) -> properties;
        Log::debug($properties); 
        return view('livewire.dashboard', [
            'user' => Auth::user(), 
            'properties' => $properties
        ]);
    }
}
