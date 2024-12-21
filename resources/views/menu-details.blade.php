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
      display: none;
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
      <h2>Manage Menu - {{$menu->name}}</h2>
      <button type="button" class="btn btn-primary add-category-button" data-coreui-toggle="modal" data-coreui-target="#addCategoryModal">
        <i class="fas fa-plus"></i> Add Category
      </button>
    </div>

    <!-- Category Section -->
    @foreach ($categories as $category )
     <div class="container ">
      <div class="card category">
          <div class="card-body d-flex justify-content-between align-items-center">
            <div class="category-title">
              <i class="fas fa-bars me-2"></i>{{$category->name}}
            </div>
            <div class="actions">
              <button class="btn btn-light"><i class="fas fa-file-alt text-primary"></i></button>
              <button
                  class="btn btn-light add-menu-item-btn"
                  data-category-id="{{ $category->id }}"
                  data-coreui-toggle="modal"
                  data-coreui-target="#addMenuItemsModal">
                  <i class="fas fa-plus text-primary"></i>
              </button>
              <button class="btn btn-light edit-category-btn"
              data-category-id="{{ $category->id }}"
                data-coreui-toggle="modal"
                data-coreui-target="#editCategoryModal">
                <i class="fas fa-pen text-primary"></i></button>
              <button class="btn btn-light"><i class="fas fa-trash-alt text-danger"></i></button>
              <i class="fas fa-chevron-down expand-icon text-secondary"></i>
            </div>
          </div>
        </div>
        <div class="expandable-content">
            @forelse ($category->menuItems as $item)
                <div class="card subcategory">
                    <div class="card-body d-flex justify-content-between align-items-center">
                        <div class="subcategory-title">
                            <i class="fas fa-bars me-2"></i>{{ $item->name }}
                        </div>
                        <div class="actions">
                            <button class="btn btn-light edit-item-btn"
                            data-item-id="{{ $item->id }}"
                                data-coreui-toggle="modal"
                                data-coreui-target="#editMenuItemsModal"><i class="fas fa-pen text-primary"></i></button>
                            <button class="btn btn-light"><i class="fas fa-trash-alt text-danger"></i></button>
                        </div>
                    </div>
                </div>
            @empty
                <strong>No items available in this category.</strong>
            @endforelse
        </div>

      </div>
    @endforeach
    @include('menu-details-crud')


  <script>
      // Handle "Add Menu Item" button clicks
      document.querySelectorAll('.add-menu-item-btn').forEach(button => {
          button.addEventListener('click', function() {
              const categoryId = this.getAttribute('data-category-id');
              document.getElementById('category_id').value = categoryId;
          });
      });
  </script>


<script src="https://cdn.jsdelivr.net/npm/@coreui/coreui@4.5.0/dist/js/coreui.bundle.min.js"></script>
<script src="{{asset('assets')}}/js/menu-details.js"></script>

<script>
    
</script>


@endsection
