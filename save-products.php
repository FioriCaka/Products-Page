<?php

require_once 'db.php';
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

$product = null;

try {
    if ($type == 'DVD') {
        if (!isset($_POST['size'])) {
            echo 'Missing size for DVD';
            exit;
        }
        $size = $_POST['size'];
        $product = new DVD($sku, $name, $price, $size);
    } elseif ($type == 'Book') {
        if (!isset($_POST['weight'])) {
            echo 'Missing weight for Book';
            exit;
        }
        $weight = $_POST['weight'];
        $product = new Book($sku, $name, $price, $weight);
    } elseif ($type == 'Furniture') {
        if (!isset($_POST['height'], $_POST['width'], $_POST['length'])) {
            echo 'Missing dimensions for Furniture';
            exit;
        }
        $height = $_POST['height'];
        $width = $_POST['width'];
        $length = $_POST['length'];
        $product = new Furniture($sku, $name, $price, $height, $width, $length);
    } else {
        echo 'Invalid product type';
        exit;
    }

    if ($product) {
        $product->save($pdo);
    }
} catch (Exception $e) {
    echo 'Error: ' . $e->getMessage();
    exit;
}

header('Location: index.php');
?>
