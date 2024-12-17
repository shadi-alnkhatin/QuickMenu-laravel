<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
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
    border: 3px solid #007bff; /* Blue border around logo */
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
    color: #007bff; /* Blue color for icons */
    margin-right: 5px;
}

    </style>
</head>
<body>



    <livewire:nav-customer-menu :menuId="$menuId" />
    <livewire:resturant-info-menu :menuId="$menuId" />


    <livewire:menu-list :menuId="$menuId" :categoryId="$categoryId" />
    <livewire:cart :menuId="$menuId" />



    <script src={{asset('assets/js/customer_menu.js')}}></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
