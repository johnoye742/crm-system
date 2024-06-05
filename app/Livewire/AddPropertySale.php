<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\PropertySale;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddPropertySale extends Component
{
    public $property;
    public $client;

    public function save() {
       // Arrange all the data to be inserted to the table from user input
       $values = [
            'property_id' => $this -> property,
            'client_id' => $this -> client,
            'organisation_id' => Auth::user() -> organisation_id,
            // Hard-code status for now
            'status' => 'opened'
       ];

       // Insert
       PropertySale::create($values);

       return redirect() -> route('dashboard');
    }

    public function render()
    {
        $organisation = Organisation::find(Auth::user() -> organisation_id);
        return view('livewire.real-estate.add-property-sale', [
            'properties' => $organisation -> properties,
            'clients' => $organisation -> clients
        ]);
    }
}
