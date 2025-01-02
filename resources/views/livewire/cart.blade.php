<div>
    <!-- View Order Button -->
    @if(count($cartItems) > 0)
        <button class="btn btn-custom w-100 position-fixed bottom-0" wire:click="toggleCartVisibility">
            View Order ({{count($cartItems)}})
        </button>
    @endif

    <!-- Cart Container -->
    @if($isCartVisible && count($cartItems) > 0)
        <div class="cart bg-light p-3 position-fixed bottom-0 w-100" style="max-height: 100vh; overflow-y: auto;">
            <div class="d-flex justify-content-between align-items-center my-2">
                <h5>Cart</h5>
                <!-- Close Button (X) -->
                <button class="btn btn-danger btn-sm" wire:click="toggleCartVisibility">X</button>
            </div>

            <ul class="list-group mb-3">
                @foreach($cartItems as $item)
                <li class="list-group-item">
                    <!-- Item Name -->
                    <div class="text-truncate" style="font-size: 18px; font-weight: bold; max-width: 100%; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">
                        {{ $item['name'] }}
                    </div>

                    <!-- Price, Quantity Control, and Remove -->
                    <div class="d-flex justify-content-between align-items-center mt-2">
                        <!-- Price -->
                        <span class="text-success" style="font-size: 18px; font-weight: 500;">${{ $item['price'] * $item['quantity'] }}</span>

                        <!-- Quantity Control -->
                        <div class="d-flex align-items-center">
                            <button class="btn btn-sm btn-custom me-1" wire:click="decrementQuantity({{ $item['id'] }})">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" class="form-control form-control-sm text-center"
                                   style="width: 50px;" min="1"
                                   wire:model.lazy="cartItems.{{ $loop->index }}.quantity">
                            <button class="btn btn-sm btn-custom ms-1" wire:click="incrementQuantity({{ $item['id'] }})">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>

                        <!-- Remove Button -->
                        <button class="btn btn-danger btn-sm" wire:click="removeItem({{ $item['id'] }})">
                            <i class="fas fa-trash"></i>
                        </button>
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
                    <div class="mb-3">
                        <label for="Name" class="form-label fw-bold">Your Name</label>
                        <input type="text" id="name" class="form-control" required
                               wire:model="name" placeholder="Enter your Name"  required>
                    </div>
                    <div class="mb-3">
                        <label for="message" class="form-label fw-bold">Any Message With order!</label>
                        <input type="text" id="message" class="form-control"
                               wire:model="message" placeholder="Enter your message">
                    </div>

                    <button type="submit" class="btn btn-custom w-100 fw-bold">
                        <i class="fas fa-shopping-cart me-2"></i>Place The Order
                    </button>
                </form>
            </div>
        </div>
    @endif
</div>

@script
<script>
      $wire.on('TostOrderPlaced', (message) => {
            toastr.options = {
                closeButton: true,
                progressBar: true,
                positionClass: 'toast-top-right',
            };
            toastr.success(message);
        });
</script>
@endscript
