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
                    <p><strong>Total Amount:</strong> <span class="badge bg-secondary" style="font-size: 16px">${{ $orderDetails->total_price }}</span></p>
                    <hr/>
                    <p><strong>Table Number:</strong> {{ $orderDetails->table_number }}</p>
                    <hr/>
                    <p><strong>Customer Name:</strong> {{ $orderDetails->customer_name }}</p>
                    <hr/>
                    <p><strong>Customer Message:</strong> {{ $orderDetails->customer_message }}</p>
                    <hr/>
                    <p><strong>Status:</strong> {{ $orderDetails->status }}</p>
                    <hr/>
                    <h5>Items:</h5>
                    <ul class="list-group">
                        @foreach($orderDetails->items as $item)
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <strong>{{ $item->menuItem->name }}</strong>
                                    <small class="text-muted d-block">Price: ${{ $item->price }} | Quantity: {{ $item->quantity }}</small>
                                </div>
                                <span class="badge bg-secondary">${{ number_format($item->price * $item->quantity, 2) }}</span>
                            </li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>

    @endif
</div>
