<?php

namespace App\Livewire\RealEstate;

use App\Models\Property;
use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class EditProperty extends Component
{
    public $id, $pname, $price, $location, $pinfo;

    public function save() {
        // Instantiate a Property Model
        $property = Property::find($this -> id);

        // Properly arrange the values from the user input
        $values = [
            'property_name' => $this -> pname,
            'property_price' => $this -> price,
            'property_location' => $this -> location,
            'property_info' => $this -> pinfo
        ];

        // Update the values
        $property -> update($values);

        // Invalidate cache
        Cache::delete('organisation_properties.' . auth() -> user() -> organisation_id);

        // Redirect to the dashboard
        return redirect() -> route('dashboard');
    }

    public function mount() {
        // Get the property from the id (could just send the collection with a post request, maybe)
        $property = Property::find($this -> id);

        // assign it to the input fields onload
        $this -> pname = $property -> property_name;
        $this -> price = $property -> property_price;
        $this -> location = $property -> property_location;
        $this -> pinfo = $property -> property_info;
    }
    public function render()
    {
        return view('livewire.real-estate.edit-property');
    }
}
