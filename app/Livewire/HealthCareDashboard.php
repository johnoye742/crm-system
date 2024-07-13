<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard - Health Care')]
class HealthCareDashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        $user_organisation = $user -> organisation;
        $patients = Patient::where('organisation_id', $user_organisation -> id) -> orderBy('id', 'DESC') -> limit(5) -> get();

        return view('livewire.health-care.dashboard', [
            'user' => $user,
            'patients' => $patients,
            'user_organisation' => $user_organisation
        ]);
    }
}
