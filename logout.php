<?php
require_once("include/connection.php");
if(isset($_SESSION['id'])){

session_unset();
session_destroy();
header('location:index.php');
}else{
header('location:index.php');
}