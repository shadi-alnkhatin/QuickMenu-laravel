<?php

namespace App\Livewire;

use App\Livewire\Actions\Logout;
use Livewire\Component;

class LogoutButton extends Component
{
    public function logout(Logout $logout)
    {
        $logout();  // Invoke the logout action

        return redirect('/');  // Redirect after logout (e.g., to home or login page)
    }

    public function render()
    {
        return view('livewire.logout-button');
    }
}
