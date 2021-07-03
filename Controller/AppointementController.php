<?php

require_once "model/appointement.php";

class AppointementController{

    ////////////////////////////////NOT WORKING CHECK CONNECTION
    
    function getUserAppointement($userid){
        header("Access-Control-Allow-Methods: GET");
        $obj = new Appointement;
        $userAppointement = $obj->getById($userid);
        
        echo json_encode($userAppointement);
    }

    ////////////////////////////////WORKING

    function createAppointement(){
        header("Access-Control-Allow-Methods: POST");
        $data = json_decode(file_get_contents("php://input"));
        $obj = new Appointement;

        $obj->date = $data->date;
        $obj->subject = $data->subject;
        $obj->reminder = $data->reminder;
        $obj->userid = $data->userid;

        $obj->AddAppointement();
    }

    ////////////////////////////////WORKING

    function deleteAppointement($id){
        $data = json_decode(file_get_contents("php://input"));
        $obj = new Appointement;

        

     

        $obj->delete($id);

    }

    ////////////////////////////////NOT WORKING

    function updateAppointement($id){
        $data = json_decode(file_get_contents("php://input"));
        $obj = new Appointement;

        $obj->date = $data->date;
        $obj->subject = $data->subject;
        $obj->reminder = $data->reminder;
        $obj->userid = $data->userid;

        $obj->update($data->id);

    }
}


?>