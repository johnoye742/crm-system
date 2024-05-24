<?php

namespace App\Livewire;

use App\Models\Client;
use App\Models\Organisation;
use App\Models\Property;
use App\Models\PropertySale;
use Livewire\Attributes\Title;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;


#[Title('Dashboard')]
class Dashboard extends Component
{
    public function render()
    {
        $orgId = Auth::user() -> organisation_id;

        // First try at caching tables for quicker data fetch
        $properties = [];

        // Try to get the properties from the cache if it's there
        $cachedProps = Cache::get('organisation_properties');

        // Checks if it exists in the cache
        if($cachedProps == null || !count($cachedProps) > 0) {
            // Fetch from the database instead if it's not in the cache
            $properties = Organisation::find($orgId) -> properties;

            // Store the fetched data in the cache for subsequent requests
            Cache::put('organisation_properties', $properties);
        } else {
            // Give the properties from cache if it exists
            $properties = $cachedProps;
        }
        
        $propertySales = PropertySale::all() -> where('organisation_id', value: $orgId);
        
        return view('livewire.dashboard', [
            'user' => Auth::user(), 
            'properties' => $properties,
            'property_sales' => $propertySales,
            'clients' => Client::all() -> where('organisation_id', $orgId)
        ]);
    }

    public function deleteProperty(int $id) {
        Property::find($id) -> delete();

        return redirect() -> back();
    }
}
