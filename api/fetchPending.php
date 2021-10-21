<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';

    $database=new Database();
    $db=$database->connect();

    function fetchRow($db){
        $query = "SELECT * FROM \"vehicleOwnerDetails\" WHERE \"status\"='PENDING'";
        $result = $db->prepare($query);
        $result->execute();

        $noOfRows = $result->rowCount();
        if($noOfRows>0){
            $row = $result->fetchAll(PDO::FETCH_ASSOC);
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

   

    fetchRow($db);
    
?>