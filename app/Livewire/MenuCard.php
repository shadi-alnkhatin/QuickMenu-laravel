<?php

namespace App\Livewire;

use App\Models\MenuItem;
use Livewire\Component;

class MenuCard extends Component
{
    public $dish;
    
    public function render()
    {
        return view('livewire.menu-card');
    }
}
