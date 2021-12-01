  <?php
    
    class Person {
        private $first_name;
        private $last_name;

        public function __construct($first_name, $last_name) {
            $this->first_name = $first_name;
            $this->last_name = $last_name;
        }
                
        public function set_first_name($first_name) {
            $this->first_name = $first_name;
        }
      
        public function get_first_name() {
            return $this->first_name;
        }
      
        public function set_last_name($last_name) {
            $this->last_name = $last_name;
        }
      
        public function get_last_name() {
           return $this->last_name;
        }
    }
    
    $person_one = new Person("John", "Doe");
    $person_one->set_first_name("Jane");
    $person_one->set_last_name("Roe");
    echo $person_one->get_first_name() . " " . $person_one->get_last_name(); // Jane Roe

    ?>
  