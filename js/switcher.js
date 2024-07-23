document.getElementById('productType').addEventListener('change', function() {
    const type = this.value;
    const container = document.getElementById('typeSpecificFields');
    container.innerHTML = '';

    if (type === 'DVD') {
        container.innerHTML = `
            <label for="size">Size (MB)</label>
            <input type="number" id="size" name="size" required>
            <p>Please, provide size in MB</p>
        `;
    } else if (type === 'Book') {
        container.innerHTML = `
            <label for="weight">Weight (KG)</label>
            <input type="number" id="weight" name="weight" required>
            <p>Please, provide weight in KG</p>
        `;
    } else if (type === 'Furniture') {
        container.innerHTML = `
            <label for="height">Height (CM)</label>
            <input type="number" id="height" name="height" required>
            
            <label for="width">Width (CM)</label>
            <input type="number" id="width" name="width" required>
            
            <label for="length">Length (CM)</label>
            <input type="number" id="length" name="length" required>
            <p>Please, provide dimensions in HxWxL format</p>
        `;
    }
});