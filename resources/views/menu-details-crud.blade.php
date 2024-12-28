<x-custom_modal id="addCategoryModal" title="Add Category">
    <form method="POST" action="{{route('category.store')}}">
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name">
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
    </form>
    @slot('footer')

    @endslot
</x-custom_modal>

<x-custom_modal id="editCategoryModal" title="Edit Category">
    <form method="POST" id="editCategoryForm">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="EditcategoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="EditcategoryName" name="EditcategoryName" placeholder="Enter category name">
        </div>
        <button type="submit" class="btn btn-success">Update</button>
    </form>
    @slot('footer')

    @endslot
</x-custom_modal>

<x-custom_modal id="addMenuItemsModal" title="Add Menu Item">
<form method="POST" action="{{route('menu_item.store')}}" enctype='multipart/form-data'>
    @csrf
    <div class="mb-3">
        <label for="MenuItemName" class="form-label">Name</label>
         <input type="text" class="form-control" id="MenuItemName" name="MenuItemName" placeholder="Enter item name">
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        <input type="hidden" name="category_id" id="category_id">
        @error('MenuItemName')
        <small class="text-danger">{{ $message }}</small>
         @enderror
    </div>
    <div class="mb-3">
        <label for="MenuItemDescription" class="form-label">Description</label>
        <input type="text" class="form-control" id="MenuItemDescription" name="MenuItemDescription" placeholder="Enter item description">
        @error('MenuItemDescription')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="MenuItemPrice" class="form-label">Price</label>
        <input type="text" class="form-control" id="MenuItemPrice" name="MenuItemPrice" placeholder="Enter item price">
        @error('MenuItemPrice')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="ItemImage" class="form-label">Upload Cover Image</label>
        <input name="ItemImage" type="file" id="ItemImage" class="form-control" accept="image/*" />
        @error('ItemImage')
        <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <input type="hidden" name="available" id="available" value="1">

    <button type="submit" class="btn btn-success">Add</button>
</form>
@slot('footer')

@endslot
</x-custom_modal>



<x-custom_modal id="editMenuItemsModal" title="Edit Menu Item">
    <input type="hidden" id="Menu_Item_ID">
    <form method="POST" enctype='multipart/form-data' id="editMenuItemForm">
        @method('PUT')
        @csrf
        <div class="mb-3">
            <label for="ItemName" class="form-label">Name</label>
             <input type="text" class="form-control" id="ItemName" name="ItemName" placeholder="Enter item name">
            @error('MenuItemName')
            <small class="text-danger">{{ $message }}</small>
             @enderror
        </div>
        <div class="mb-3">
            <label for="ItemDescription" class="form-label">Description</label>
            <input type="text" class="form-control" id="ItemDescription" name="ItemDescription" placeholder="Enter item description">
            @error('MenuItemDescription')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <label for="ItemPrice" class="form-label">Price</label>
            <input type="text" class="form-control" id="ItemPrice" name="ItemPrice" placeholder="Enter item price">
            @error('MenuItemPrice')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
            <input type="hidden" name="available" value="0"> <!-- This ensures the checkbox sends 0 when unchecked -->
            <input type="checkbox" class="form-check-input" id="availablee" name="available" value="1" {{ old('available') == 1 ? 'checked' : '' }}>
            <label for="availablee" class="form-label">Available</label>
            @error('available')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ItemImage" class="form-label">Upload Cover Image</label>
            <input name="ItemImage" type="file" id="ItemImage" class="form-control" accept="image/*" />
            @error('ItemImage')
            <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>


        <button type="submit" id="UpdateMenuItemBtn" class="btn btn-success ">Update</button>
    </form>
    @slot('footer')

    @endslot
    </x-custom_modal>

    <x-custom_modal id="deleteMenuItemModal" title="Delete Menu Item">
        <form method="POST" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="modal-body text-center">
                <h3 class="mb-3">Are you sure you want to delete this Menu Item?</h3>
                <p class="text-muted">This action is inreversible. Once deleted, the menu item cannot be restored.</p>

                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="submit" class="btn btn-danger text-light">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
                </div>
            </div>

            @slot('footer')

            @endslot
        </form>
    </x-custom_modal>
    <x-custom_modal id="deleteCategoryModal" title="Delete Category">
        <form method="POST" enctype="multipart/form-data">
            @method('DELETE')
            @csrf
            <div class="modal-body text-center">
                <h3 class="mb-3">Are you sure you want to delete this Category?</h3>
                <p class="text-muted">This action is inreversible. Once deleted, the category and thier items cannot be restored.</p>

                <div class="d-flex justify-content-center gap-2 mt-4">
                    <button type="submit" class="btn btn-danger text-light">Yes, Delete</button>
                    <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Cancel</button>
                </div>
            </div>

            @slot('footer')

            @endslot
        </form>
    </x-custom_modal>
