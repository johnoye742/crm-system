<?php

namespace App\Livewire\HealthCare;

use App\Models\Organisation;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Patients')]
class Patients extends Component
{
    public function render()
    {
        $patients = User::where('organisation_id', Auth::user() -> organisation -> id) -> where('role', 'health-care-patient') -> orderBy('id', 'DESC') -> paginate(15);
        return view('livewire.health-care.patients', ['patients' => $patients]);
    }
}
