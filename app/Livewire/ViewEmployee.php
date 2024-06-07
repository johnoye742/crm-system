<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;


class ViewEmployee extends Component
{
    public $email;
    #[Title("View Employee")]
    public function render()
    {
        Gate::authorize('employees.view', $this -> email);
        
        return view('livewire.view-employee', [
            'employee' => User::all() -> where('email', $this -> email) -> first()
        ]);
    }
}
