<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddEmployees extends Component
{
    #[Validate('required|email|max:500')]
    public $email;
    #[Validate('required|max:300')]
    public $fname;
    #[Validate('required')]
    public $pwd;
    #[Validate('required')]
    public $role;

    public function add() {
        $this -> validate();
        $user = Auth::user();

        // Check if the  user is an administrator before adding new user
        Gate::authorize('add-employees');

        User::create([
            'email' => $this -> email,
            'name' => $this -> fname,
            'password' => $this -> pwd,
            'organisation_id' => $user -> organisation_id,
            'niche' => $user -> niche,
            'role' => $this -> role
        ]);

        return redirect() -> route('dashboard');
    }

    public function render()
    {
        return view('livewire.add-employees');
    }
}
