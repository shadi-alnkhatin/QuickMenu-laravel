<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
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



.header-section {
    background-color: #f8f9fa; /* Light background */
    border-color: #ddd; /* Light gray border */
    background-repeat: no-repeat;
    background-size: cover;
    background-position: center;
    filter: contrast(0.8);
}
.cafe-info{
    background-color: #33333389;

}

.cafe-logo {
    width: 120px;
    height: 120px;
    object-fit: cover;
    border: 3px solid var(--primary-color); /* Blue border around logo */
}

.cafe-name {
    font-size: 2rem;
    color: #333;
    margin-bottom: 0.5rem;
}

.cafe-description {
    font-size: 1rem;
    color: #666;
    margin-bottom: 1rem;
}

.cafe-details p {
    font-size: 0.95rem;
    color: #555;
    margin: 0;
}

.cafe-details i {
    color: var(--primary-color); /* Blue color for icons */
    margin-right: 5px;
}
input[type="number"] {
    -moz-appearance: textfield;
}
input[type="number"]::-webkit-inner-spin-button,
input[type="number"]::-webkit-outer-spin-button {
    -webkit-appearance: none;
    margin: 0;
}
.toast {
    opacity: 1 !important;
    z-index: 9999; 
    }
    .toast-success {
        background-color: #1d9f3c !important; /* Light green */
        color: #dfe0df !important; /* Dark green text */
    }
.menu-card-img{
    width: 230px;
    height: 150px;
    object-fit: cover;
}
@media(max-width:760px){
    .menu-card-img {
    width: 100% !important; /* Ensures the image takes the full width of its container */
    height: 230px; /* Maintains the aspect ratio of the image */
    object-fit: cover; /* Ensures the image covers the container while maintaining its aspect ratio */
}
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
