<?php

namespace App\Livewire\HealthCare;

use App\Models\Organisation;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Dashboard - Health Care')]
class HealthCareDashboard extends Component
{
    public function render()
    {
        $user = Auth::user();
        $user_organisation = Organisation::find($user -> current_organisation);
        $patients = User::where('organisation_id', $user_organisation -> id) -> where('role', 'health-care-patient') -> orderBy('id', 'DESC') -> limit(5) -> get();
        return view('livewire.health-care.dashboard', [
            'user' => $user,
            'patients' => $patients,
            'user_organisation' => $user_organisation
        ]);
    }
}
