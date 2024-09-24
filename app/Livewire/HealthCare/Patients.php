<?php

namespace App\Livewire\HealthCare;

use App\Models\Organisation;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Johnoye742\PhpHermes\Hermes;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Patients')]
class Patients extends Component
{
    public function render()
    {
        $patients = User::where('organisation_id', Auth::user() -> current_organisation) -> where('role', 'health-care-patient') -> orderBy('id', 'DESC') -> paginate(15);
        Log::debug($patients);

        $hermes = new Hermes('localhost', 2907);
        Log::debug($hermes -> get('patients:'. Auth::user() -> current_organisation));
        $hermes -> set('patients:'. Auth::user() -> current_organisation, json_encode($patients));

        return view('livewire.health-care.patients', ['patients' => $patients, 'organisation' => Organisation::find(Auth::user() -> current_organisation)]);
    }
}
