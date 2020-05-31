<?php

class SqlHelper extends mysqli{

    private $host = "localhost";
    private $account = "root";
    private $password = "";
    private $db = "zero_demo";
    private $port = "3306";
    
    public $isConnectError = false;

    public function __construct(){
        parent::__construct($this->host,$this->account,$this->password,$this->db,$this->port);

        if($this->connect_error){
            $this->isConnectError = true;
        }
        $this->set_charset("utf8");
    }
}

// class A{
//     protected $a = 1;

//     public function __construct($a){
//         $this->a=$a;
//     }

//     protected function hello(){
//         echo $this->a;
//     }
// }

// class B extends A{
//     protected $b = 2;
//     public function __construct($a,$b){
//         parent::__construct($a); 
//         parent::hello();
//     }
//     protected function hello(){
//         echo $this->b;
//     }
// }
// $a = new B(2,3);