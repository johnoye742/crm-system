<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\Property;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Livewire\Component;

#[Title('Add Property')]
class AddPropertyPage extends Component
{
    #[Validate('required|max:200')]
    public $pname;
    #[Validate('required|max:200')]
    public $price;
    #[Validate('required|max:200')]
    public $location;
    #[Validate('required')]
    public $pinfo;

    public function add() {
        Log::alert('well it works, I guess');
        $this -> validate();
        $values = [
            'property_name' => $this -> pname,
            'property_price' => $this -> price,
            'property_location' => $this -> location,
            'property_info' => $this -> pinfo,
            'user_id' => Auth::user() -> id,
            'organisation_id' => Auth::user() -> organisation_id
        ];

        $property = new Property($values);

        if($property -> save()) {
            // Invalidate cache
            Cache::delete('organisation:properties.' . Auth::user() -> organisation_id);
            
            return redirect() -> route('dashboard');
        }
    }
    
    public function render()
    {
        return view('livewire.real-estate.add-property-page', ['organizations' => Organisation::all()]);
    }
}
