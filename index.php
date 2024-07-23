<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link rel="stylesheet" href="css/styles.css">
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

        $stmt = $pdo->query('SELECT * FROM products ORDER BY id');
        while ($row = $stmt->fetch()) {
            echo '<div class="product">';
            echo '<input type="checkbox" class="delete-checkbox" data-id="' . $row['id'] . '">';
            echo '<p>' . $row['sku'] . '</p>';
            echo '<p>' . $row['name'] . '</p>';
            echo '<p>' . $row['price'] . ' $</p>';
            if ($row['type'] == 'DVD') {
                echo '<p>Size: ' . $row['size'] . ' MB</p>';
            } elseif ($row['type'] == 'Book') {
                echo '<p>Weight: ' . $row['weight'] . ' KG</p>';
            } elseif ($row['type'] == 'Furniture') {
                echo '<p>Dimensions: ' . $row['height'] . 'x' . $row['width'] . 'x' . $row['length'] . ' CM</p>';
            }
            echo '</div>';
        }
        ?>
    </main>
    <script src="js/delete.js"></script>
</body>
</html>
