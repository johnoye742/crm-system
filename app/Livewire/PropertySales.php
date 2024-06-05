<?php

namespace App\Livewire;

use App\Models\PropertySale;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class PropertySales extends Component
{
    public $id;
    public $value;
    public $change = false;

    public function mount() {
        $this -> value = PropertySale::find($this -> id) -> status;

    }

    public function selectionChanged() {
        $this -> change = true;
    }

    public function save() {
        $property = PropertySale::find($this -> id);
        $property -> update(['status' => $this -> value]);

        return redirect() -> route("dashboard");
    }

    public function render()
    {
        $property = PropertySale::find($this -> id);
        Log::debug($property);
        return view('livewire.real-estate.property-sales', ['property' => $property]);
    }
}
