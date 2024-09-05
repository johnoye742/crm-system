<?php

namespace App\Livewire\HealthCare;

use App\Models\Organisation;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Johnoye742\PhpHermes\Hermes;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Patients')]
class Patients extends Component
{
    public function render()
    {
        $patients = User::where('organisation_id', Auth::user() -> organisation -> id) -> where('role', 'health-care-patient') -> orderBy('id', 'DESC') -> paginate(15);

        $hermes = new Hermes('localhost', 2907);
        $hermes -> set('patients:'. Auth::user() -> organisation_id, $patients -> get());

        return view('livewire.health-care.patients', ['patients' => $patients]);
    }
}
