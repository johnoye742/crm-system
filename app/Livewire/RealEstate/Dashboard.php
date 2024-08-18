<?php

namespace App\Livewire\RealEstate;

use App\Models\Client;
use App\Models\Organisation;
use App\Models\Property;
use App\Models\PropertySale;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redis;


#[Title('Dashboard')]
class Dashboard extends Component
{
    public $orgId;

    public function render()
    {
        $this -> orgId = Auth::user() -> organisation_id;

        // Try to get the properties from the cache if it's there and fetch from the db if it's not
        $properties = Cache::rememberForever("organisation:properties.". $this -> orgId, function () {
            return Organisation::find($this -> orgId) -> properties;
        });


        $propertySales = PropertySale::all() -> where('organisation_id', value: $this -> orgId);

        return view('livewire.real-estate.dashboard', [
            'user' => Auth::user(),
            'properties' => $properties,
            'property_sales' => $propertySales,
            'clients' => Client::all() -> where('organisation_id', $this -> orgId)
        ]);
    }

    public function deleteProperty(int $id) {
        // Delete the property from the database
        Property::find($id) -> delete();

        // Invalidate cache
        Cache::delete('organisation:properties.' . Auth::user() -> organisation_id);

        return redirect() -> back();
    }
}
