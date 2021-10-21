<?php

$config=require 'config.php';

      class connection{

         public static function make($config){
            try{
               // return $pdo=new PDO('conection','usernamed','password');
      
               return new PDO( 
                  $config['connection&DB'],
                  $config['username'],
                  $config['password']
      
               );
            }catch(PDOException $e){
               die("cant connect to db ". $e->getMessage());
            }
         }
      };




     

    $pdo=connection::make($config['database']);
    session_start();