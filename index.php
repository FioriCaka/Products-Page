<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/home-page.css">
</head>
<body>
    <header>
        <h1>Product List</h1>
        <button onclick="window.location.href='add-product'">ADD</button>
        <button id="delete-product-btn">MASS DELETE</button>
    </header>
    <main>
        <?php
        require_once 'db.php';
        require_once 'classes/Product.php';
        require_once 'classes/DVD.php';
        require_once 'classes/Book.php';
        require_once 'classes/Furniture.php';
        require_once 'classes/Product-Creator.php';

        $stmt = $pdo->query('SELECT * FROM products ORDER BY id');
        while ($row = $stmt->fetch()) {
            echo '<div class="product">';
            echo '<input type="checkbox" class="delete-checkbox" data-id="' . $row['id'] . '">';

            $attributes = [
                'size' => $row['size'] ?? null,
                'weight' => $row['weight'] ?? null,
                'height' => $row['height'] ?? null,
                'width' => $row['width'] ?? null,
                'length' => $row['length'] ?? null,
            ];

            try {
                $product = ProductCreator::createProduct($row['type'], $row['sku'], $row['name'], $row['price'], $attributes);
                $product->display();
                
            } catch (Exception $e) {
                echo 'Error: ' . $e->getMessage();
            }
            echo '</div>';
        }
        ?>
    </main>
    <script src="js/delete.js"></script>
</body>
</html>
