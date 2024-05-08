<?php

namespace App\Livewire;

use App\Models\Organisation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddPropertySale extends Component
{
    public $property;
    public $client;
    public function render()
    {
        $organisation = Organisation::find(Auth::user() -> organisation_id);
        return view('livewire.add-property-sale', [
            'properties' => $organisation -> properties,
            'clients' => $organisation -> clients
        ]);
    }
}
