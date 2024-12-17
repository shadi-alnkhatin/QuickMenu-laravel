<?php

namespace App\Livewire;

use App\Models\Menu;
use Livewire\Component;


class ResturantInfoMenu extends Component
{
    public $menuId;             // Menu ID passed to the component
    public $resturantInfo;      // Restaurant info to store menu details

    public function mount()
    {
        // Retrieve restaurant information based on menuId
        $this->resturantInfo = Menu::where('id', $this->menuId)->first();
    }

    public function render()
    {
        // Pass the restaurant information to the view
        return view('livewire.resturant-info-menu', [
            'resturantInfo' => $this->resturantInfo
        ]);
    }
}
