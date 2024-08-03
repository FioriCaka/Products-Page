
document.addEventListener('DOMContentLoaded', function() {
    const typeSpecificFields = {
        'DVD': function() {
            return '<label for="size">Size (MB)</label>' + 
                   '<input type="number" id="size" name="size" required>' + 
                   '<p>Please, provide size in MB</p>';
        },
        'Book': function() {
            return  '<label for="weight">Weight (Kg)</label>' + 
                    '<input type="number" id="weight" name="weight" required>' +
                    '<p>Please, provide weight in KG</p>';
        },
        'Furniture': function() {
            return '<label for="height">Height (CM)</label><input type="number" id="height" name="height" required>' +
                   '<label for="width">Width (CM)</label><input type="number" id="width" name="width" required>' +
                   '<label for="length">Length (CM)</label><input type="number" id="length" name="length" required>' +
                   '<p>Please, provide dimensions in HxWxL format</p>';
        }
    };

    document.getElementById('productType').addEventListener('change', function() {
        const type = this.value;
        const typeSpecificFieldsContainer = document.getElementById('typeSpecificFields');
        typeSpecificFieldsContainer.innerHTML = typeSpecificFields[type] ? typeSpecificFields[type]() : '';
    });
});
