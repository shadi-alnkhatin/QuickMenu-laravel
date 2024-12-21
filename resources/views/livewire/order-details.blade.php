<div>
    <!-- Button to load order details -->
    <button wire:click="loadOrderDetails({{ $orderId }})" class="btn btn-primary text-light w-100">
        View Order Details
    </button>

    <!-- Display order details after they are loaded -->
    @if($orderDetails)
        <div class="order-details modal">
            <div class="modal-content">
                <div class="modal-header">
                    <h4>Order ID: {{ $orderDetails->id }}</h4>
                    <button wire:click="clearOrderDetails" class="close-btn">&times;</button>
                </div>
                <div class="modal-body">
                    <p><strong>Total Amount:</strong> ${{ $orderDetails->total_price }}</p>
                    <p><strong>Customer Name:</strong> {{ $orderDetails->customer_name }}</p>

                    <p><strong>Customer Message:</strong> {{ $orderDetails->customer_message }}</p>
                    <p><strong>Status:</strong> {{ $orderDetails->status }}</p>

                    <h5>Items:</h5>
                    <ul>
                        @foreach($orderDetails->items as $item)
                            <li>{{ $item->menuItem->name }} - ${{ $item->price }} x {{ $item->quantity }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    @endif
</div>
