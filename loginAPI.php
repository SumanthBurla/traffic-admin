
<?php
require_once("include/connection.php");
require_once("include/curl_call.php");

$email=@$_POST['email'];
$password=@$_POST['pass'];
// echo $email,$password;
    // $passs=md5($password);
    // login by mail

            $url = 'http://34.122.5.95/api/validLogin.php/';

            
            $content = json_encode(array('Email'=>$email,'Password'=>$password),JSON_FORCE_OBJECT);
           
            // function call curlcall($url,$content){  }
            $response=curlcall($url,$content);

            var_dump($response);

            // $response returns...
            // var_dump($response);
            //echo $response;
            if($response['message'] == 'Invalid Email')
            {
            header('location:index.php?error=User doesn\'t existssss');
            die();
            }
            if($response['message'] == 'Invalid Password!')
            {
            header('location:index.php?error=Invalid Password !');
            die();
            }           
            if($response['message'] == 'ValidLogin')
            {
            $_SESSION['id']=$response['CustomerId'];
            header('location:GenerateChallan.php');
            }
    




?>
