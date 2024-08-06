<?php

require_once 'Product.php';

class DVD extends Product {
    private $size;

    public function __construct($sku, $name, $price, $attributes) {
        parent::__construct($sku, $name, $price);
        $this->setSize($attributes['size']);
        
    }

    public function setSize($size) {
        $this->size = $size;
    }

    public function getSize() {
        return $this->size;
    }

    public function save($pdo) {
        $stmt = $pdo->prepare("INSERT INTO products (sku, name, price, type, size) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), 'DVD', $this->getSize()]);
    }

    public function display() {
        parent::display();
        echo '<p>Size: ' . $this->getSize() . ' MB</p>';
    }
}
?>
