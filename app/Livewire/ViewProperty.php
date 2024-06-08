<?php

namespace App\Livewire;

use App\Models\Property;
use Livewire\Component;

class ViewProperty extends Component
{
    public $property;

    public function mount(Property $property) {

    }
    
    public function render()
    {
        return view('livewire.view-property');
    }
}
