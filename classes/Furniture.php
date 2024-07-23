<?php

require_once 'Product.php';

class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $height, $width, $length) {
        parent::__construct($sku, $name, $price);
        $this->setHeight($height);
        $this->setWidth($width);
        $this->setLength($length);
        $this->type = 'Furniture';
    }

    public function setHeight($height) {
        $this->height = $height;
    }

    public function getHeight() {
        return $this->height;
    }

    public function setWidth($width) {
        $this->width = $width;
    }

    public function getWidth() {
        return $this->width;
    }

    public function setLength($length) {
        $this->length = $length;
    }

    public function getLength() {
        return $this->length;
    }

    public function save($pdo) {
        $stmt = $pdo->prepare("INSERT INTO products (sku, name, price, type, height, width, length) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->type, $this->height, $this->width, $this->length]);
    }

    public function getDetails() {
        return "Dimensions: " . $this->height . "x" . $this->width . "x" . $this->length . " CM";
    }
}
?>
