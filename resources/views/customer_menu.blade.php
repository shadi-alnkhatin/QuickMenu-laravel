<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="{{asset('assets/css/customer_menu.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
          :root {
        --primary-color: {{ $menu->primary_color ?? '#555' }};
    }
    .btn-custom{
        background-color: var(--primary-color);
        color: white;
    }
    .btn-custom:hover{
        background-color: var(--primary-color);
        color: white;

    }
    .btn-custom:focus{
        background-color: var(--primary-color);
        color: white;
        border-color: var(--primary-color);
        box-shadow: 0 0 0 2px var(--primary-color);
    }

.cafe-logo {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 3px solid var(--primary-color); /* Blue border around logo */
}


.cafe-details i {
    color: var(--primary-color); /* Blue color for icons */
    margin-right: 5px;
}

    </style>
</head>
<body>



    <livewire:nav-customer-menu :menuId="$menuId" />
    <livewire:resturant-info-menu :menuId="$menuId" />


    <livewire:menu-list :menuId="$menuId" :categoryId="$categoryId" />
    <livewire:cart :menuId="$menuId" />

@livewireScripts()
<script>
  const offcanvas = document.querySelector('.offcanvas'); // Adjust selector as needed
offcanvas.addEventListener('hidden.bs.offcanvas', function () {
    document.body.style.overflow = 'auto'; // Re-enable scroll when sidebar closes
});


</script>
    <script src={{asset('assets/js/customer_menu.js')}}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
