<?php

namespace App\Livewire;

use App\Models\PropertySale;
use Livewire\Component;

class PropertySales extends Component
{
    public $id;
    public $value;
    public $change = false;

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
        return view('livewire.property-sales', ['property' => $property]);
    }
}
