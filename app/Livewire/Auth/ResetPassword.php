<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Livewire\Attributes\Validate;
use Livewire\Component;

class ResetPassword extends Component
{
    public $token;
    #[Validate('required|email')]
    public $email;
    #[Validate('required|min:8')]
    public $pwd1;
    #[Validate('required|min:8|confirmed')]
    public $password;
    public function mount() {
        $this -> email = request() -> get("email");
    }
    public function render()
    {
        return view('livewire.auth.reset-password');
    }

    public function update() {
        $status = Password::reset($this -> only('email', 'password', 'token'),
            function (User $user, string $pwd2) {
                $user -> forceFill([
                    'password' => Hash::make($pwd2)
                ]);
                $user -> save();

                event(new PasswordReset($user));

            }
        );

        return $status === Password::PASSWORD_RESET
                        ? redirect()->route('login')->with('status', __($status))
                        : back()->withErrors(['email' => [__($status)]]);
    }
}
