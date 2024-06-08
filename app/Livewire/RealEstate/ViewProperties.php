<?php

namespace App\Livewire\RealEstate;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class ViewProperties extends Component
{
    public function render()
    {
        $organisation_id = Auth::user() -> organisation_id;
        $properties = Cache::rememberForever("organisation:properties.$organisation_id", function() {

            return Auth::user() -> organisation -> properties;
        });
        return view('livewire.real-estate.view-properties', [
            'properties' => $properties
        ]);
    }
}
