<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';

    $database=new Database();
    $db=$database->connect();

    $data = json_decode(file_get_contents("php://input"));

    $num = $data->num;

    function fetchRow($db,$num){
        $query = "SELECT * FROM \"vehicleOwnerDetails\" WHERE \"numberplate\"='$num'";
        $result = $db->prepare($query);
        $result->execute();

        $noOfRows = $result->rowCount();
        if($noOfRows>0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            // $name=$row['name'];
            // $email=$row['email'];
            // $contact=$row['contact'];
            // $numberplate=$row['numberplate'];
            // $status=$row['status'];            
                echo json_encode($row);
            
        }else{
            echo json_encode(
                array('message' => 'Number plate does not exists')
            );
        }
    }

   

    fetchRow($db,$num);
    
?>