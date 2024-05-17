<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\Property;
use App\Models\PropertySale;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $orgId = Auth::user() -> organisation_id;
        $properties = Organisation::find($orgId) -> properties;
        $propertySales = PropertySale::all() -> where('organisation_id', value: $orgId);
        Log::debug($propertySales);
        return view('livewire.dashboard', [
            'user' => Auth::user(), 
            'properties' => $properties,
            'property_sales' => $propertySales
        ]);
    }

    public function deleteProperty(int $id) {
        Property::find($id) -> delete();

        return redirect() -> back();
    }
}
