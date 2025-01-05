<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithPagination;

class RestaurantOrders extends Component
{
    use WithPagination;

    public $menus = [];
    public $menuId = null;
    public $selectedOrder = null;

    #[On('NewOrderPlaced')]
    public function refreshOrders()
    {
        $this->resetPage(); // Reset pagination to the first page
    }

    public function updatedMenuId()
    {
        $this->refreshOrders();
        $this->dispatch('menuUpdated', $this->menuId);
    }

    public function updateStatus($orderId, $newStatus)
    {
        $order = Order::find($orderId);

        if ($order) {
            $order->status = $newStatus;
            $order->save();
        }

        $this->refreshOrders();
    }

    public function getOrderDetail($orderId)
    {
        $this->selectedOrder = Order::find($orderId);
        $this->dispatch('openModal');
    }

    public function render()
    {
        return view('livewire.restaurant-orders', [
            'orders' => $this->menuId
                ? Order::where('menu_id', $this->menuId)->latest()->paginate(5)
                : collect() // Return an empty collection if no menu is selected
        ]);
    }
}
