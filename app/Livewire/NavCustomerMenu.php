<?php

namespace App\Livewire;

use App\Events\WaiterCalled;
use App\Models\Category;
use Livewire\Component;

class NavCustomerMenu extends Component
{
    public $menuId;
    public $catagories = [];
    public $tableNumber; // To store the table number
    public $showForm = false;

    public function mount($menuId){
        $this->menuId = $menuId;
        $this->loadCategories();
    }
    public function loadCategories(){
        $this->catagories = Category::where('menu_id', $this->menuId)->get();
    }
    public function selectCategory($categoryId)
    {
        $this->dispatch('closeOffcanvas');
        $this->dispatch('categorySelected', $categoryId);
    }
    public function showCallWaiterForm()
    {
        $this->showForm = true;
    }

    public function callWaiter()
    {
        $this->validate([
            'tableNumber' => 'required|numeric|min:1',
        ]);

        // Dispatch the event with menuId and tableNumber
        broadcast(new WaiterCalled($this->menuId, $this->tableNumber))->toOthers();

        // Reset form and hide it
        $this->reset('tableNumber', 'showForm');
        $this->dispatch('toastrWaiterCalled',  'Waiter called successfully!');
    }

    public function render()
    {
        return view('livewire.nav-customer-menu');
    }
}
