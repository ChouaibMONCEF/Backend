<?php

require_once "model/user.php";

class UserController
{

    ////////////////////////////////WORKING

    ////////////////////////////////FETCH ALL DATA EXPECT REFERENCE

    public function Register()
    {
        header("Access-Control-Allow-Methods: POST");
        $data = json_decode(file_get_contents("php://input"));
        $obj = new user;

        $obj->FirstName = $data->FirstName;
        $obj->LastName = $data->LastName;
        $obj->email = $data->email;
        $obj->uref = $data->uref;

        $obj->register();
    }

    ////////////////////////////////WORKING 

    ////////////////////////////////STILL NOT WORKING IN THE FRONTEND

    public function login()
    {
        header("Access-Control-Allow-Methods: POST");
        $data = json_decode(file_get_contents("php://input"));
        

        $Reference = $data->uref;
        $con = new user;
        $query = $con->connect($Reference);
        $row = $query->fetch(PDO::FETCH_ASSOC);
        if (isset($row["uref"])) {
            echo json_encode(["message" => "1"]);
        } else {
            echo json_encode(["message" => "0"]);
        }
    }
}
