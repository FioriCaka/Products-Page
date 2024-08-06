<?php

require_once 'Product.php';

class Furniture extends Product {
    private $height;
    private $width;
    private $length;

    public function __construct($sku, $name, $price, $attributes) {
        parent::__construct($sku, $name, $price);
        $this->setHeight($attributes['height']);
        $this->setWidth($attributes['width']);
        $this->setLength($attributes['length']);
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
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), 'Furniture', $this->getHeight(), $this->getWidth(), $this->getLength()]);
    }

    public function display() {
        parent::display();
        echo '<p>Dimensions: ' . $this->getHeight() . 'x' . $this->getWidth() . 'x' . $this->getLength() . ' CM</p>';
    }
}
?>
