<?php

namespace App\Livewire;

use App\Models\Order;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class OrderDetails  extends Component
{
    public $orderId;
    public $orderDetails;

    public function loadOrderDetails($orderId)
    {
        $this->orderId = $orderId;
        $this->orderDetails = Order::find($orderId); // Fetch the order details
    }
    public function clearOrderDetails()
{
    $this->orderDetails = null; // Clears the order details
}

    public function render()
    {
        return view('livewire.order-details');
    }
}
