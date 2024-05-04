<?php

namespace App\Livewire;

use Livewire\Component;

class TextInput extends Component
{
    public $placeholder;
    public $value;

    public function mount($placeholder, $value = "") {
        $this -> placeholder = $placeholder;
        $this -> value = $value;
    }

    public function render()
    {
        return view('livewire.text-input');
    }
}
