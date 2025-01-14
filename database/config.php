<?php 

class config{

    private $hostname = "localhost";
    private $username = "root";
    private $password = ""; 
    private $database = "user_db";
    private $con;
    
    public function __construct()
    {
        $this->con = new mysqli($this->hostname, $this->username, $this->password, $this->database);
// if ($this->con->conect_error) {
        //     die("conection failed: " . $this->con->conect_error);
        //   }
        //   echo "conected successfully";

    }
     // insert - update -delete
     public function runDML(string $query) : bool
     {
         $result = $this->con->query($query);
         if($result){
             return true;
         }
         return false;
     }
     // selects
     public function runDQL(string $query) 
     {
         $result = $this->con->query($query);
         if($result->num_rows > 0){
             return $result;
         }
         return [];
     }
 
}


?>