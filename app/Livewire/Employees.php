<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\User;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Title('Employees')]
class Employees extends Component
{
    public $organisation;
    public function mount() {
        // Get the organisation from its model when the component first loads
        $this -> organisation =  Organisation::find(auth() -> user() -> organisation_id);
    }
    public function render()
    {
        return view('livewire.employees', [
            'employees' => $this -> organisation -> employees -> where('role', "!=", 'health-care-patient'),
            'organisation_name' => $this -> organisation -> name
        ]);
    }

    public function deleteEmployee($id) {
        $employee = User::find($id);

        $employee -> delete();

        return redirect() -> route('dashboard');
    }
}
