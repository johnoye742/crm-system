<?php

namespace App\Livewire;

use App\Models\Client;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddClient extends Component
{
    // Validate livewire form data
    #[Validate('required|max:50')]
    public $cname;
    #[Validate('required')]
    public $phone;
    #[Validate('required|email')]
    public $email;

    public function save() {
        // Collect data from Livewire form and arrange it properly to be inserted into the clients table
        $value = [
            'client_name' => $this -> cname,
            'client_phone' => $this -> phone,
            'client_email' => $this -> email,
            'organisation_id' => auth() -> user() -> organisation_id,
            'property_id' => 0
        ];

        // Add a client with data given from form
        Client::create($value);

        // If successful redirect to the dashboard
        return redirect() -> route('dashboard');
    }
    public function render()
    {
        return view('livewire.real-estate.add-client');
    }
}
