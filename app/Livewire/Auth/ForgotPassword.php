<?php

namespace App\Livewire\Auth;

use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ForgotPassword extends Component
{
    #[Validate('required|email')]
    public $email;

    public $alert;

    public function render()
    {
        return view('livewire.auth.forgot-password');
    }

    public function sendLink() {
        $status = Password::sendResetLink([
            'email' => $this -> email
        ]);

        if($status == Password::RESET_LINK_SENT) {
            $alert = "Successfully sent reset link";
        }
    }
}
