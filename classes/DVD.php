<?php

require_once 'Product.php';

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $size) {
        parent::__construct($sku, $name, $price);
        $this->setSize($size);
        $this->type = 'DVD';
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function save($pdo) {
        $stmt = $pdo->prepare("INSERT INTO products (sku, name, price, type, size) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->sku, $this->name, $this->price, $this->type, $this->size]);
    }

    public function getDetails() {
        return "Size: " . $this->size . " MB";
    }
}
?>
