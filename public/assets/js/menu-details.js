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
