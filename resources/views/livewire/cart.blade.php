<div>
    <!-- View Order Button -->
    @if(count($cartItems) > 0)
        <button class="btn btn-info w-100 position-fixed bottom-0" wire:click="toggleCartVisibility">
            View Order
        </button>
    @endif

    <!-- Cart Container -->
    @if($isCartVisible && count($cartItems) > 0)
        <div class="cart bg-light p-3 position-fixed bottom-0 w-100">
            <div class="d-flex justify-content-between align-items-center">
                <h5>Cart</h5>
                <!-- Close Button (X) -->
                <button class="btn btn-danger btn-sm" wire:click="toggleCartVisibility">X</button>
            </div>

            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <div>
                            <strong>{{ $item['name'] }}</strong>
                            <span class="text-muted">x{{ $item['quantity'] }}</span>
                        </div>
                        <div class="d-flex">
                            <span class="text-success me-3">${{ $item['price'] * $item['quantity'] }}</span>
                            <button class="btn btn-danger btn-sm" wire:click="removeItem({{ $item['id'] }})">Remove</button>
                        </div>
                    </li>
                @endforeach
            </ul>
               
            <div class="bg-light p-3 rounded">
                <form wire:submit.prevent="checkout">
                    <div class="mb-3">
                        <label for="tableNumber" class="form-label fw-bold">Table Number</label>
                        <input type="number" id="tableNumber" class="form-control" required
                               wire:model="tableNumber" placeholder="Enter your table number" min="1" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 fw-bold">
                        <i class="fas fa-shopping-cart me-2"></i>Place The Order
                    </button>
                </form>
            </div>


        </div>
    @endif
</div>
