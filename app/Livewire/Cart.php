<?php

namespace App\Livewire;

use App\Events\NewOrderPlaced;
use App\Models\Menu;
use App\Models\Order;
use Illuminate\Support\Facades\Http;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\HttpKernel\HttpClientKernel;

class Cart extends Component
{
    public $user_id;
    public $menuId;
    public $tableNumber;
    public $name;
    public $message;
    public $cartItems = [];
    public $isCartVisible = false;

    public function mount(){
        $this->user_id = Menu::where('id', $this->menuId)->value('user_id');
    }

    #[On('addDishToCart')]
    public function addDishToCart($dish)
    {

        // Check if the dish is already in the cart
        $existingDish = collect($this->cartItems)->firstWhere('id', $dish['id']);

        if ($existingDish) {
            // Increment quantity if already in cart
            foreach ($this->cartItems as &$item) {
                if ($item['id'] == $dish['id']) {
                    $item['quantity'] += 1;
                }
            }
        } else {
            // Add new item to cart
            $this->cartItems[] = [
                'id' => $dish['id'],
                'name' => $dish['name'],
                'price' => $dish['price'],
                'quantity' => 1,
            ];
        }
    }

    public function removeItem($dishId)
    {
        // Remove item from the cart
        $this->cartItems = array_values(array_filter($this->cartItems, fn($item) => $item['id'] != $dishId));
    }
    public function toggleCartVisibility()
    {
        $this->isCartVisible = !$this->isCartVisible;
    }
    public function getTotalPrice(){
        return collect($this->cartItems)->sum(fn($item) => $item['price'] * $item['quantity']);
    }
    public function checkout()
    {
        $order = Order::create([
            'user_id' => $this->user_id,
            'menu_id' => $this->menuId,
            'total_price' => $this->getTotalPrice(),
            'table_number'=>$this->tableNumber,
            'customer_name'=>$this->name,
            'customer_message'=>$this->message,

        ]);
        foreach ($this->cartItems as $item) {
            $order->items()->create([
                'menu_item_id' => $item['id'],
                'quantity' => $item['quantity'],
                'price' => $item['price'],
            ]);
        }
        broadcast(new NewOrderPlaced(order: $order))->toOthers();

        $this->cartItems=[];
        $this->isCartVisible = false;
        $this->dispatch('TostOrderPlaced',  'Order Placed successfully!');
    }

    public function decrementQuantity($dishId)
    {
         foreach ($this->cartItems as &$item) {
             if ($item['id'] == $dishId && $item['quantity'] > 1) {
                 $item['quantity'] -= 1;
             }
         }
    }
    public function incrementQuantity($dishId)
    {
        foreach ($this->cartItems as &$item) {
            if ($item['id'] == $dishId) {
                $item['quantity'] += 1;
            }
        }
    }

    public function render()
    {
        return view('livewire.cart');
    }
}
