<?php

namespace App\Livewire;

use App\Models\Organisation;
use App\Models\User;
use Illuminate\Contracts\View\View as IlluminateView;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Create Organisation')]
class CreateOrganisation extends Component
{
    public $name;
    public $niche;

    /**
     * @return Illuminate\Contracts\View\View
     */
    public function render() : IlluminateView
    {
        return view('livewire.create-organisation');
    }

    public function create() {
        $organisation = Organisation::create([
            "name" => $this -> name,
            "niche" => $this -> niche
        ]);

        $user = User::find(Auth::user() -> id);

        $organisations = [];
        if($user -> organisations != null) {
            $organisations = json_decode($user -> organisations);
            array_push($organisations, $organisation -> id);
        } else {
            $organisations[0] = $organisation -> id;
        }

        $user -> update(['organisations' => $organisations]);

        return redirect() -> route('dashboard');
    }
}
