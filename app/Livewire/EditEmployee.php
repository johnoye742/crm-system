<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;

class EditEmployee extends Component
{
    public $id;
    public $fname;
    public $email;
    public $pwd;
    public $role;

    public function mount() {
        // Get the employee (user) from the given id
        $employee = User::find($this -> id);

        // Fill in the inputs with data from $employee
        $this -> fname = $employee -> name;
        $this -> email = $employee -> email;
        $this -> role = $employee -> role;
    }

    public function save() {
        // Instantiate an instance of the User model with the given id
        $user = User::find($this -> id);

        // Arrange the values that will go into the table
        $values = [
            'name' => $this -> fname,
            'email' => $this -> email,
            'role' => $this -> role
        ];

        $user -> update($values);

        return redirect() -> route('employees');
    }

    public function render()
    {
        return view('livewire.edit-employee');
    }
}
