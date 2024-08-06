<?php

class ProductCreator {
    public static function createProduct($type, $sku, $name, $price, $attributes) {
        $productClass = ucfirst($type);

        if (!class_exists($productClass)) {
            throw new Exception("Invalid product type");
        }

        return new $productClass($sku, $name, $price, $attributes);
    }
}
?>