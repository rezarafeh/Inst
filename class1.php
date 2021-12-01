<?php
    class Fruit {
        protected $name;
        protected $colour;

        public function __construct($name, $colour) {
            $this->name = $name;
            $this->colour = $colour;
        }
        final public function some_message() {
            echo "name => $this->name, colour => $this->colour";
        }

    }

    class Banana extends Fruit { // Note the extends keyword
        // Overriding the parent's ctor
        public function __construct($name, $colour, $weight) {
           // $this->name = $name;
           // $this->colour = $colour;
           parent::__construct($name, $colour);
            $this->weight = $weight;
        }

        // Overriding the parent's some_message method
   /*     public function some_message() {
           // echo "name => $this->name, colour => $this->colour, weight => $this->weight";
            parent::some_message();
            echo ", weight => $this->weight";
        }
        */
    }
    
    $apple = new Fruit("apple", "red");
    $apple->some_message(); // name => apple, colour => red
    echo nl2br("\n");
    $banana = new Banana("banana", "yellow", 20);
    $banana->some_message(); // name => banana, colour => yellow, weight => 20
?>