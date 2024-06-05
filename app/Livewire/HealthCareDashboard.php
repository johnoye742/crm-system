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
        $user_organisation = Organisation::find($user -> organisation_id);
        return view('livewire.health-care.dashboard', [
            'user' => $user,
            'patients' => $user_organisation -> patients,
            'user_organisation' => $user_organisation
        ]);
    }
}
