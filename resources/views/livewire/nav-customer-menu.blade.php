<div class="container-fluid mb-3 py-2">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <!-- Left-aligned button -->
                <button class="btn btn-custom" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Right-aligned button -->
                <button class="btn btn-custom" type="button" wire:click="showCallWaiterForm" >
                    Call The Waiter
                </button>
                 <!-- Form to request table number -->

    </div>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Categories</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="sidebar" class="">
                        <div class="nav flex-column py-3">
                            @foreach ($catagories as $category)
                            <a href="#" wire:click.prevent="selectCategory({{ $category->id }})" class=" text-dark nav-link " style="text-decoration: none; font-size:22px">
                                → {{ $category->name }}
                            </a>
                        @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    @if($showForm)
    <div class="form-group mt-3">
        <label for="tableNumber">Enter Table Number:</label>
        <input type="number" id="tableNumber" class="form-control" wire:model="tableNumber" placeholder="Table Number">
        @error('tableNumber') <span class="text-danger">{{ $message }}</span> @enderror
    </div>
 <button class="btn btn-primary mt-2" wire:click="callWaiter">Submit</button>
<button class="btn btn-secondary mt-2" wire:click="$set('showForm', false)">Cancel</button>
@endif

        <!-- Success message -->
        @if (session()->has('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif
</div>
