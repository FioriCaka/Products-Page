<?php

abstract class Product {
    protected $sku;
    protected $name;
    protected $price;

    public function __construct($sku, $name, $price) {
        $this->setSku($sku);
        $this->setName($name);
        $this->setPrice($price);
    }

    public function setSku($sku) {
        $this->sku = $sku;
    }

    public function getSku() {
        return $this->sku;
    }

    public function setName($name) {
        $this->name = $name;
    }

    public function getName() {
        return $this->name;
    }

    public function setPrice($price) {
        $this->price = $price;
    }

    public function getPrice() {
        return $this->price;
    }

    abstract public function save($pdo);

    public function display() {
        echo '<p>SKU: ' . $this->getSku() . '</p>';
        echo '<p>Name: ' . $this->getName() . '</p>';
        echo '<p>Price: ' . $this->getPrice() . ' $</p>';
    }
}
?>
