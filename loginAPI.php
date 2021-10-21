<?php
require_once("include/connection.php");
require_once("include/curl_call.php");

$email=@$_POST['email'];
$password=@$_POST['pass'];
echo $email;
    // $passs=md5($password);
    // login by mail
            $url = 'https://trafficadmin.herokuapp.com/api/validLogin.php/';
            
            $content = json_encode(array('Email'=>$email,'Password'=>$password),JSON_FORCE_OBJECT);
           
            // function call curlcall($url,$content){  }
            $response=curlcall($url,$content);
            
            // $response returns...
            var_dump($response);
            echo $response;
            if($response['message'] == 'Invalid Email')
            {
            header('location:login.php?error=User doesn\'t existssss');
            die();
            }
            if($response['message'] == 'Invalid Password!!')
            {
            header('location:login.php?error=Invalid Password !');
            die();
            }           
            if($response['message'] == 'ValidLogin')
            {
            $_SESSION['id']=$response['CustomerId'];
            header('location:GenerateChallan.php');
            }
    




?>