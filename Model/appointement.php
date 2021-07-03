<?php 

require_once "connection.php";

class appointement{
    public $date;
    public $id;
    public $subject;
    public $reminder;
    public $userid;
    
    static private $table="appointments";

    function __construct(){
        $this->db = new Connection();
    }

    function getById($id){
        return $this->db->selectById($id);
    }


    function AddAppointement(){
        return $this->db->add(self::$table, ["date", "subject", "reminder", "userid"], [$this->date, $this->subject, $this->reminder, $this->userid]);
    }

    function update($id){
        return $this->db->update(self::$table, ["date", "subject", "reminder", "userid"], [$this->date, $this->reminder, $this->reminder, $this->userid], $id);
    }

    function delete($id){
        $this->db->delete(self::$table, $id);
    }
}


?>