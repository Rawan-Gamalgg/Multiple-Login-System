<?php 
include_once __DIR__.'\..\database\config.php';
include_once __DIR__ . '\..\database\operations.php';

class User extends config implements operations{
    private $id;
    private $name;
    private $password;
    private $email;
    private $user_type;

    public function create(){
    $query = "insert into users (name,password,email,user_type) 
    values('$this->name','$this->password', '$this->email','$this->user_type')";
    return $this->runDML($query);
    }
    public function read(){

    }
    public function update(){

    }
    public function delete(){

    }
    public function login(){
$query = "select * from users where email='$this->email' AND password = '$this->password'";
return $this->runDQL($query);
    }

    public function search(){
        $query = "select * from users where email='$this->email' ";
        return $this->runDQL($query);
            }



    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set the value of name
     *
     * @return  self
     */ 
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the value of password
     *
     * @return  self
     */ 
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of user_type
     */ 
    public function getUser_type()
    {
        return $this->user_type;
    }

    /**
     * Set the value of user_type
     *
     * @return  self
     */ 
    public function setUser_type($user_type)
    {
        $this->user_type = $user_type;

        return $this;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }
}


?>