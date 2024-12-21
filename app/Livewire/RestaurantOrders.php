<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Attributes\On;
use Livewire\Component;

class RestaurantOrders extends Component
{
    public $menus=[];
    public $menuId = null; // Make sure this is public
    public $orders = [];
    public $selectedOrder = null;

    public function mount()
    {
        $this->refreshOrders();
    }


    #[On('NewOrderPlaced')]
    public function refreshOrders()
    {
        $this->orders = $this->menuId
            ? Order::where('menu_id', $this->menuId)->latest()->get()
            : [];
    }


    public function updatedMenuId()
    {
        $this->refreshOrders();
        $this->dispatch('menuUpdated', $this->menuId);
    }
    public function updateStatus($orderId, $newStatus)
    {
        // dd($orderId, $newStatus);
    $order = Order::find($orderId);

    if ($order) {
        $order->status = $newStatus;
        $order->save();
    }

    // Refresh orders to reflect changes
    $this->refreshOrders();
    }
    public function getOrderDetail($orderId)
    {
        // dd($orderId);
    $this->selectedOrder = Order::find($orderId);
    $this->dispatch('openModal');
    }

    public function render()
    {
        return view('livewire.restaurant-orders',['orders' => $this->orders]);
    }
}
