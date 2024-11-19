@extends('layouts.base')


 @section('head')


  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Manage Menu - Lukka Cafe</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
  <link rel="stylesheet" href="{{asset('assets')}}/vendors/simplebar/css/simplebar.css">
  <!-- Main styles for this application-->
  <link href="{{asset('assets')}}/css/style.css" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link href="{{asset('assets')}}/css/examples.css" rel="stylesheet">
  <script src="{{asset('assets')}}/js/config.js"></script>
  <script src="{{asset('assets')}}/js/color-modes.js"></script>
  <script src="js/config.js"></script>
    <script src="js/color-modes.js"></script>
    <link href="vendors/@coreui/chartjs/css/coreui-chartjs.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
    <!-- MDB -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/8.0.0/mdb.min.css" rel="stylesheet" />

  <style>
    body {
      background-color: #f8f9fa;
    }
    .header {
      display: flex;
      justify-content: space-between;
      align-items: center;
      margin-bottom: 20px;
    }
    .category, .subcategory {
      border: 1px solid #dee2e6;
      border-radius: 0.375rem;
      margin-bottom: 10px;
    }
    .category-title, .subcategory-title {
      font-weight: 500;
      color: #495057;
    }
    .actions .btn {
      padding: 0.25rem 0.5rem;
      font-size: 0.875rem;
    }
    .expandable-content {
      padding-left: 20px;
    }
    .add-category-button {
      font-size: 1rem;
    }
  </style>
 @endsection
@section('content')



<div class="container my-4">
  <!-- Header Section -->
  <div class="header">
    <h2>Manage Menu - Lukka Cafe</h2>
    <button type="button" class="btn btn-primary add-category-button" data-coreui-toggle="modal" data-coreui-target="#addCategoryModal">
      <i class="fas fa-plus"></i> Add Category
    </button>
  </div>

  <!-- Category 1 -->
  @foreach ($categories as $category )
   <div class="container ">
    <div class="card category">
        <div class="card-body d-flex justify-content-between align-items-center">
          <div class="category-title">
            <i class="fas fa-bars me-2"></i>{{$category->name}}
          </div>
          <div class="actions">
            <button class="btn btn-light"><i class="fas fa-file-alt text-primary"></i></button>
            <button class="btn btn-light"data-coreui-toggle="modal" data-coreui-target="#addMenuItemsModal"><i class="fas fa-plus text-primary"></i></button>
            <button class="btn btn-light"><i class="fas fa-pen text-primary"></i></button>
            <button class="btn btn-light"><i class="fas fa-trash-alt text-danger"></i></button>
            <i class="fas fa-chevron-down expand-icon text-secondary"></i>
          </div>
        </div>
      </div>
      <div class="expandable-content">
        <div class="card subcategory">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div class="subcategory-title">
              <i class="fas fa-bars me-2"></i>Soğuk içecekler
            </div>
            <div class="actions">
              <button class="btn btn-light"><i class="fas fa-pen text-primary"></i></button>
              <button class="btn btn-light"><i class="fas fa-trash-alt text-danger"></i></button>
            </div>
          </div>
        </div>
      </div>
    </div>


  @endforeach

  <!-- Expandable Content (Hidden by Default) -->



<x-custom_modal id="addCategoryModal" title="Add Category">
    <form method="POST" action="{{route('category.store')}}">
        @csrf
        <div class="mb-3">
            <label for="categoryName" class="form-label">Category Name</label>
            <input type="text" class="form-control" id="categoryName" name="categoryName" placeholder="Enter category name">
            <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        </div>
        <button type="submit" class="btn btn-success">Add</button>
        @slot('footer')

        @endslot
    </form>
</x-custom_modal>
<x-custom_modal id="addMenuItemsModal" title="Add Menu Item">
<form method="POST" action="{{route('menu_item.store')}}">
    @csrf
    <div class="mb-3">
        <label for="MenuItemName" class="form-label">Name</label>
        <input type="text" class="form-control" id="MenuItemName" name="MenuItemName" placeholder="Enter item name">
        <input type="hidden" name="menu_id" value="{{ $menu->id }}">
        <input type="hidden" name="category_id" value="{{ $category->id }}">

    </div>
    <div class="mb-3">
        <label for="MenuItemDescription" class="form-label">Description</label>
        <input type="text" class="form-control" id="MenuItemDescription" name="MenuItemDescription" placeholder="Enter item description">
    </div>

    <div class="mb-3">
        <label for="MenuItemPrice" class="form-label">Price</label>
        <input type="text" class="form-control" id="MenuItemPrice" name="MenuItemPrice" placeholder="Enter item price">
    </div>
    <input type="hidden" name="available" id="available" value="1">

    <button type="submit" class="btn btn-success">Add</button>
    @slot('footer')

    @endslot
</form>

</x-custom_modal>

<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.5.0/dist/js/coreui.bundle.min.js"></script>
<script>
  // JavaScript for expand/collapse functionality
  document.querySelectorAll('.expand-icon').forEach(icon => {
    icon.addEventListener('click', () => {
      const expandableContent = icon.closest('.category').nextElementSibling;
      if (expandableContent.style.display === 'none' || expandableContent.style.display === '') {
        expandableContent.style.display = 'block';
        icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
      } else {
        expandableContent.style.display = 'none';
        icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
      }
    });
  });
</script>
@endsection
