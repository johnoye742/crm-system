<?php

namespace App\Livewire\RealEstate;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ViewProperties extends Component
{
    public function render()
    {
        $organisation_id = Auth::user() -> organisation_id;
        $properties = Auth::user() -> organisation -> properties() -> orderBy('id', 'DESC') -> paginate(15);

        return view('livewire.real-estate.view-properties', [
            'properties' => $properties
        ]);
    }
}
