<?php

class Product {
  private $name;
  public $description;
  public $price;

  public function getDescription() {
    return $this->description;
  }

  public function setDescription($new_description) {
    $this->description = ucfirst($new_description);
  }

  function __construct($name, $description, $price) {
    $this->name = $name;
    $this->description = $description;
    $this->price = $price;
  }
}

$product = new Product("iPhone 12", 'test description', 250);
$product2 = new Product("iPhone 12 Pro", 'test description etc', 550);

echo $product->getDescription();
?>
<br>
<?php
echo $product->setDescription('abcdef fenerfahce');
echo $product->getDescription();


var_dump($product);

var_dump($product2);




