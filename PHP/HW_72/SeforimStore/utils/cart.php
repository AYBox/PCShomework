<?php
/*class Cart {
    private $items;

    public function __construct() {
        $this->items = [];
    }

    public function addItem($item, $quantity) {
        if(!empty($this->items[$item])) {
            $quantity += $this->items[$item];
        }
        $this->items[$item] = $quantity;
    }

    public function getItems() {
        return $this->items;
    }
}*/

/*
class Cart {
    public function __construct() {
        session_start();
    }

    public function addItem($item, $quantity) {
        if(!empty($_SESSION[$item])) {
            $quantity += $_SESSION[$item];
        }
        $_SESSION[$item] = $quantity;
    }

    public function getItems() {
        return $_SESSION;
    }
}

class Car {
    public $make;
    public $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }
}
*/

class Cart {
    public function __construct() {
        session_start();
        
        if(empty($_SESSION['cart'])) {
            $_SESSION['cart'] = [];
        }
    }

    public function addItem($item, $quantity) {
        if(!empty($_SESSION['cart'][$item])) {
            $quantity += $_SESSION['cart'][$item];
        }
        $_SESSION['cart'][$item] = $quantity;
    }

    public function removeItem($item){
        
    }

    public function updateQty($item, $qty){
        
    }

    public function clearCart(){
            $_SESSION['cart'] = [];
    }

    public function getItems() {
        return $_SESSION['cart'];
    }
}

/*
$cart = new Cart();
$cart->addItem("Paper", 5);
$cart->addItem("Paper", 1);
$cart->addItem("Pens", 3);

print_r($cart->getItems());
echo "<br>";

//$_SESSION['car'] = new Car("Tesla", 3);
echo "{$_SESSION['car']->make} {$_SESSION['car']->model}";
print_r($_SESSION);
*/
?>