
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
                  window.location.reload();
              } else {
                  alert('Error deleting products');
              }
          });
    }
});
