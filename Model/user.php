<?php 

require_once "connection.php";

class user{
    public $uref;
    public $FirstName;
    public $LastName;
    public $email;
    
    static private $table="users";

    function __construct(){
        $this->db = new Connection();
    }


    function register(){
        return $this->db->add(self::$table, ["FirstName", "LastName", "email", "uref"], [$this->FirstName, $this->LastName, $this->email, $this->uref]);
    }

    function connect($uref){
        $result = $this->db->login($uref);
        return $result;
    }
}


?>