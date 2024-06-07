<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class EmployeePolicy
{
    /**
     * Create a new policy instance.
     */
    public function __construct()
    {
        //
    }

    public function view(User $user, string $email) {
        $viewing_user = User::all() -> where('email', $email) -> first();
        Log::debug($viewing_user -> organisation_id == $user -> organisation_id);

        return $user -> organisation_id == 1;
    }
}
