<?php 

require_once "connection.php";

class appointement{
    public $date;
    public $id;
    public $subject;
    public $reminder;
    public $rref;
    
    static private $table="appointments";

    function __construct(){
        $this->db = new Connection();
    }

    function getById($id){
        return $this->db->selectById($id);
    }


    function AddAppointement(){
        return $this->db->add(self::$table, ["date", "subject", "reminder", "rref"], [$this->date, $this->subject, $this->reminder, $this->rref]);
    }

    function update($id){
        return $this->db->update(self::$table, ["date", "subject", "reminder", "rref"], [$this->date, $this->reminder, $this->reminder, $this->rref], $id);
    }

    function delete($id){
        $this->db->delete(self::$table, $id);
    }
}


?>