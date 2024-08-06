<?php

require_once 'db.php';
require_once 'classes/Product-Creator.php';
require_once 'classes/Product.php';
require_once 'classes/DVD.php';
require_once 'classes/Book.php';
require_once 'classes/Furniture.php';

if (!isset($_POST['sku'], $_POST['name'], $_POST['price'], $_POST['productType'])) {
    echo 'Missing required fields';
    exit;
}

$sku = $_POST['sku'];
$name = $_POST['name'];
$price = $_POST['price'];
$type = $_POST['productType'];

try {
    $stmt = $pdo->prepare("SELECT COUNT(*) FROM products WHERE sku = ?");
    $stmt->execute([$sku]);
    if ($stmt->fetchColumn() > 0) {
        echo 'SKU already exists';
        exit;
    }
} catch (PDOException $e) {
    echo 'Database error: ' . $e->getMessage();
    exit;
}
try {
    $attributes = $_POST;
    $product = ProductCreator::createProduct($type, $sku, $name, $price, $attributes);
    $product->save($pdo);

} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}

header('Location: index.php');
?>
