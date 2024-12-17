<?php

namespace App\Livewire;

use App\Models\Category;
use App\Models\MenuItem;
use Livewire\Attributes\On;
use Livewire\Component;

class MenuList extends Component
{
    public $menuId;        // The menu ID passed as a parameter
    public $categoryId;    // The category ID passed or resolved
    public $dishes = [];   // List of dishes for the selected category

    public function mount()
    {
    if (!$this->categoryId) {
            $this->categoryId = Category::where('menu_id', $this->menuId)->value('id');
        }
        $this->loadDishes();
    }

    #[On('categorySelected')]
    public function updateCategory($categoryId)
    {

        $this->categoryId = $categoryId;
        $this->loadDishes();
    }

    public function loadDishes()
    {
        // Fetch dishes based on the current CategoryId and menuId
        $this->dishes = MenuItem::where('menu_id', $this->menuId)
            ->when($this->categoryId, function ($query) {
                $query->where('category_id', $this->categoryId);
            })
            ->get();
    }

    #[On('setDish')]
    public function addToCart($dishId)
    {
        // Find the dish by its ID and dispatch it to a cart event
        $dish = MenuItem::find($dishId);
        if ($dish) {
            $this->dispatch('addDishToCart', $dish);
        }
    }

    public function render()
    {

        return view('livewire.menu-list',['category_name' => $categoryName = Category::find($this->categoryId)?->name]);
    }
}
