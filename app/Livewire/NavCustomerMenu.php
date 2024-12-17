<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;

class NavCustomerMenu extends Component
{
    public $menuId;
    public $catagories = [];
    public function mount($menuId){
        $this->menuId = $menuId;
        $this->loadCategories();
    }
    public function loadCategories(){
        $this->catagories = Category::where('menu_id', $this->menuId)->get();
    }
    public function selectCategory($categoryId)
    {
        $this->dispatch('categorySelected', $categoryId);
    }


    public function render()
    {
        return view('livewire.nav-customer-menu');
    }
}
