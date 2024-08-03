
document.getElementById('delete-product-btn').addEventListener('click', function() {
    const checkedBoxes = document.querySelectorAll('.delete-checkbox:checked');
    const ids = Array.from(checkedBoxes).map(box => box.getAttribute('data-id'));

    if (ids.length > 0) {
        fetch('delete-products.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ ids }),
        }).then(response => response.json())
          .then(data => {
              if (data.success) {
                ids.forEach(id => {
                    const card = document.querySelector(`.product .delete-checkbox[data-id="${id}"]`).parentElement;
                    if (card) {
                        card.remove();
                    } else {
                        console.log('Card not found for ID:', id); 
                    }
                });
              } else {
                  alert('Error deleting products');
              }
          });
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const checkboxes = document.querySelectorAll('.delete-checkbox');

    if (checkboxes.length > 0) {
        checkboxes.forEach(checkbox => {
            checkbox.addEventListener('change', function() {
                const productDiv = this.parentElement;
                if (this.checked) {
                    productDiv.classList.add('product-shadow');
                } else {
                    productDiv.classList.remove('product-shadow');
                }
            });
        });
    }
});

