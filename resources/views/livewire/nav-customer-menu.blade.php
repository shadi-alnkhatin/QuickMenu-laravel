<div class="container-fluid mb-3 py-2">
    <div class="row">
        <div class="col">
            <div class="d-flex justify-content-between">
                <!-- Left-aligned button -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    <i class="bi bi-list"></i>
                </button>

                <!-- Right-aligned button -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
                    Call The Waiter
                </button>
            </div>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" data-bs-keyboard="false" data-bs-backdrop="false" aria-labelledby="offcanvasExampleLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Sidebar</h5>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <div id="sidebar" class="border rounded">
                        <div class="nav flex-column py-3">
                            @foreach ($catagories as $category)
                            <a href="#" wire:click.prevent="selectCategory({{ $category->id }})" class="nav-link">
                                {{ $category->name }}
                            </a>
                        @endforeach

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
