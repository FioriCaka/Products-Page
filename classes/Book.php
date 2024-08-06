<?php

require_once 'Product.php';

class Book extends Product {
    private $weight;

    public function __construct($sku, $name, $price, $attributes) {
        parent::__construct($sku, $name, $price);
        $this->setWeight($attributes['weight']);

    }

    public function setWeight($weight) {
        $this->weight = $weight;
    }

    public function getWeight() {
        return $this->weight;
    }

    public function save($pdo) {
        $stmt = $pdo->prepare("INSERT INTO products (sku, name, price, type, weight) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$this->getSku(), $this->getName(), $this->getPrice(), 'Book', $this->getWeight()]);
    }

    public function display() {
        parent::display();
        echo '<p>Weight: ' . $this->getWeight() . ' KG</p>';
    }
}
?>
