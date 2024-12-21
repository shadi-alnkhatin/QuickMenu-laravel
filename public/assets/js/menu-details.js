 // Dynamically set category_id in the Add Menu Items Modal
 document.querySelectorAll('.add-menu-item-btn').forEach(button => {
    button.addEventListener('click', () => {
        const categoryId = button.getAttribute('data-category-id');
        document.getElementById('category_id').value = categoryId;
    });
});

// Toggle expandable content
document.querySelectorAll('.expand-icon').forEach(icon => {
    icon.addEventListener('click', () => {
        // Find the closest container and toggle its expandable content
        const container = icon.closest('.container');
        const expandableContent = container.querySelectorAll('.expandable-content');

      expandableContent.forEach(content => {
        if (content.style.display === 'none' || content.style.display === '') {
            content.style.display = 'block';
            icon.classList.replace('fa-chevron-down', 'fa-chevron-up');
        } else {
            content.style.display = 'none';
            icon.classList.replace('fa-chevron-up', 'fa-chevron-down');
        }
      });
    });
});


document.addEventListener('DOMContentLoaded', function() {
    const editItemButtons = document.querySelectorAll('.edit-item-btn');
    const editCategoryButtons = document.querySelectorAll('.edit-category-btn');

    editCategoryButtons.forEach(function(btn){
        btn.addEventListener('click', function() {
            const categoryId = this.getAttribute('data-category-id');

            fetch(`http://127.0.0.1:8000/edit-category/${categoryId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const form = document.getElementById('editCategoryForm');
                    form.setAttribute('action', `/update-category/${data.id}`);
                    document.getElementById('EditcategoryName').value = data.name;

                })
                .catch(err => console.error('Error fetching data:', err));
        });
    });




    editItemButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            const menuItemId = this.getAttribute('data-item-id');


            fetch(`http://127.0.0.1:8000/edit-menu-items/${menuItemId}`)
                .then(response => response.json())
                .then(data => {
                    console.log(data);
                    const form = document.getElementById('editMenuItemForm');
                    form.setAttribute('action', `/update-menu-item/${data.id}`);
                    document.getElementById('ItemName').value = data.name;
                    document.getElementById('Menu_Item_ID').value = data.id;
                    document.getElementById('ItemDescription').value = data.description;
                    document.getElementById('ItemPrice').value = data.price;
                    if (data.available=== 1) {
                        document.getElementById('availablee').checked = true;
                    } else {
                        document.getElementById('availablee').checked = false;
                     }
                    document.getElementById('ItemImage').value = '';

                })
                .catch(err => console.error('Error fetching data:', err));
        });
    });

 });
