<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="css/add-product.css">

</head>
<body>
    <header>
        <h1> Add Product</h1>
    </header>
    <main>
        <form id="product_form" method="post" action="save-products.php">
            <label for="sku">SKU</label>
            <input type="text" id="sku" name="sku" required>
            
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
            
            <label for="price">Price ($)</label>
            <input type="number" id="price" name="price" required>
            
            <label for="productType">Type Switcher</label>
            <select id="productType" name="productType" required>
                <option value="">Select Type</option>
                <option value="DVD">DVD</option>
                <option value="Book">Book</option>
                <option value="Furniture">Furniture</option>
            </select>
            
            <div id="typeSpecificFields"></div>
            
            <button type="submit">Save</button>
            <button type="button" onclick="window.location.href='/'">Cancel</button>
        </form>
    </main>
    <script src="js/switcher.js"></script>
</body>
</html>
