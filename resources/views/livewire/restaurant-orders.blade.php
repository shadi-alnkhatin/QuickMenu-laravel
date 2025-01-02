<div>
    <!-- Filter Section -->
    <form  class="d-flex justify-content-end mb-3">
        <select name="menu_id" class="form-select w-25 me-2" wire:model.live="menuId">
            <option value="">-- Select Menu --</option>
            @foreach($menus as $menu)
                <option value="{{ $menu->id }}">
                    {{ $menu->name }}
                </option>
            @endforeach
        </select>
    </form>

    <!-- Orders Table -->
    <div class="card mb-4">
        <div class="card-header">Orders</div>
        <div class="card-body">
            @if(count($orders) == 0)
                <p>No orders available for this menu.</p>
            @else
                <div class="tab-content rounded-bottom">
                    <div class="tab-pane p-3 active preview" role="tabpanel" id="preview-1000">
                        <!-- Add table-responsive wrapper here -->
                        <div class="table-responsive">
                            <table class="table table-striped border table-hover">
                                <thead>
                                    <tr>
                                        <th>Table Number</th>
                                        <th>Total Price</th>
                                        <th>Status</th>
                                        <th>Ordered At</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                        <tr>
                                            <td class="text-center">{{ $order->table_number }}</td>
                                            <td class="text-center"><strong>${{ $order->total_price }}</strong></td>
                                            <td>
                                                <span class="badge
                                                    {{ $order->status == 'active' ? 'bg-success' : 'bg-secondary' }}">
                                                    {{ ucfirst($order->status) }}
                                                </span>
                                            </td>
                                            <td>{{ $order->created_at }}</td>
                                            <td>
                                                <select wire:change="updateStatus({{ $order->id }}, $event.target.value)"
                                                        class="form-select">
                                                    <option value="active" {{ $order->status == 'active' ? 'selected' : '' }}>
                                                        Active
                                                    </option>
                                                    <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>
                                                        Completed
                                                    </option>
                                                </select>
                                                @livewire('order-details', ['orderId' => $order->id], key($order->id))
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div> <!-- End table-responsive -->
                    </div>
                </div>
            @endif
        </div>
    </div>
    <!-- Modal to see details -->

</div>


<!-- JavaScript to Play Notification Sound -->
@script

<script>

    (function loadPusher() {
    const script = document.createElement('script');
    script.src = "https://js.pusher.com/8.3.0/pusher.min.js";
    script.onload = function () {
        console.log("Pusher loaded successfully!");

        const pusher = new Pusher('0c4c5fa886d0d5115520', {
            cluster: 'ap2',
            encrypted: true
        });

        let currentChannel = null;

        const subscribeToChannel = (menuId) => {
            const notificationUrl = "{{ auth()->user()->notificationUrl() }}";
            if (currentChannel) {
                // Unsubscribe from the previous channel
                pusher.unsubscribe(currentChannel.name);
                console.log(`Unsubscribed from channel: ${currentChannel.name}`);
            }

            if (!menuId) {
                console.log("No menu ID selected. Not subscribing to any channel.");
                return;
            }

            const channelName = `restaurant-${menuId}-orders`;
            currentChannel = pusher.subscribe(channelName);
            console.log(`Subscribed to channel: ${channelName}`);

            // Bind events
            currentChannel.bind('App\\Events\\NewOrderPlaced', function () {
                window.Livewire.dispatch('NewOrderPlaced');
                if (Notification.permission === 'granted') {
                    new Notification('New Order Placed', {
                        body: `Check the order table  `,
                        icon: 'https://cdn-icons-png.flaticon.com/512/3500/3500833.png'
                    });
                    const audio = new Audio(notificationUrl);
                    audio.play();
                }
            });

            pusher.connection.bind('connected', function () {
                console.log(`Pusher connected to channel: ${channelName}`);
            });
        };

        // New: Listen to the Waiter Called channel
        const subscribeToWaiterCallChannel = (menuId) => {
            const notificationUrl = "{{ auth()->user()->notificationUrl() }}";
            const waiterCallChannelName = `menu.${menuId}`;
            const waiterCallChannel = pusher.subscribe(waiterCallChannelName);

            console.log(`Subscribed to channel: ${waiterCallChannelName}`);

            waiterCallChannel.bind('App\\Events\\WaiterCalled', function (data) {
                console.log('Waiter Called Event:', data);

                // Notify the user
                if (Notification.permission === 'granted') {
                    new Notification('Waiter Call Alert', {
                        body: `Table ${data.tableNumber} requested a waiter.`,
                        icon: 'https://cdn-icons-png.flaticon.com/512/6200/6200100.png'
                    });

                    const audio = new Audio(notificationUrl);
                    audio.play();
                }
            });
        };

        $wire.on('menuUpdated', (menuId) => {
            console.log(`Menu ID updated to: ${menuId}`);
            subscribeToChannel(menuId);
            subscribeToWaiterCallChannel(menuId); // Subscribe to Waiter Call channel
        });
    };

    script.onerror = function () {
        console.error("Failed to load Pusher script.");
    };

    document.head.appendChild(script);
})();

</script>
@endscript

