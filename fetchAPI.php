<?php
require_once("include/connection.php");
require_once("include/curl_call.php");

$num=@$_POST['number'];
echo $num;
            $url = 'https://trafficadmin.herokuapp.com/api/fetchRow.php/';
                               
            // function call curlcall($url,$content){  }
           
            $content = json_encode(array('num'=>$num),JSON_FORCE_OBJECT);
            
            // function call curlcall($url,$content){  }
            $response=curlcall($url,$content);
            // $response returns...
            var_dump($response);
            echo $response;
            if($response['numberplate'] == $num)
            {
               

            }
            if($response['message'] == 'Number plate does not exists')
            {
            header('location:GenerateChallan.php?error=Number plate does not exists');
            die();
            }     
            
    




?>