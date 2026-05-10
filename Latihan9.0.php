<?php

class Employee {

    public $name;
    public $salary;

    public function __construct($name, $salary){
        $this->name = $name;
        $this->salary = $salary;
    }

    public function getInfo(){
        return "Nama: ".$this->name." | Gaji: ".$this->salary;
    }
}

// membuat object
$employee1 = new Employee("Andi", 5000000);
$employee2 = new Employee("Budi", 4500000);

// menampilkan output
echo $employee1->getInfo()."<br/>";
echo $employee2->getInfo();

?>