<?php

require_once "model/appointement.php";

class AppointementController{

    ////////////////////////////////WORKING

    ////////////////////////////////WORKING FROM THE FRONTEND STILL NEED SOME UPDATES AFTER FINISHING THE LOGIN
    
    function getUserAppointement($uefoe){
        header("Access-Control-Allow-Methods: GET");
        $obj = new Appointement;
        $userAppointement = $obj->getById($uefoe);
    
        echo json_encode(["appointment"=>$userAppointement]);
    }

    ////////////////////////////////WORKING

    ////////////////////////////////WORKING FROM THE FRONTEND STILL USER ID AFTER FINISHING THE LOGIN

    function createAppointement(){
        header("Access-Control-Allow-Methods: POST");
        $data = json_decode(file_get_contents("php://input"));
        $obj = new Appointement;

        $obj->date = $data->date;
        $obj->subject = $data->subject;
        $obj->reminder = $data->reminder;
        $obj->rref = $data->rref;

        $obj->AddAppointement();
    }

    ////////////////////////////////WORKING

    ////////////////////////////////WORKING

    function deleteAppointement($id){
        $data = json_decode(file_get_contents("php://input"));
        $obj = new Appointement;

        $obj->delete($id);

    }

    ////////////////////////////////NOT WORKING

    ////////////////////////////////NOT WORKING IN THE FRONTEND TOO, OBVIOUSLY

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