<?php
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: POST');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');

    include_once 'config/Database.php';

    $database=new Database();
    $db=$database->connect();

    $data = json_decode(file_get_contents("php://input"));

    $email = $data->Email;
    $pass = $data->Password;

    function validateLogin($db,$email,$pass){
        $query = "SELECT \"password\" FROM \"aadmin\" WHERE \"email\"='$email'";
        $result = $db->prepare($query);
        $result->execute();

        $noOfRows = $result->rowCount();
        if($noOfRows>0){
            $row = $result->fetch(PDO::FETCH_ASSOC);
            if(strcmp($row['password'],$pass)==0){
                $customerId = getCustomerId($db,$email);
                echo json_encode(
                    array('message' => 'ValidLogin',
                    'CustomerId' => $customerId)
                );
            }else{
                echo json_encode(
                    array('message' => 'Invalid Password!')
                );
            }
        }else{
            echo json_encode(
                array('message' => 'Invalid Email')
            );
        }
    }

    function getCustomerId($db,$email){
        $query = "SELECT \"sno\" FROM \"aadmin\" WHERE \"email\"='$email'";
        $stmt = $db->prepare($query);
        $stmt->execute();

        $noOfRows = $stmt->rowCount();
        if($noOfRows==1){
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            return $row['sno'];
        }else{
            return -1;
        }
    }

    validateLogin($db,$email,$pass);
    
?>