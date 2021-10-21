<?php
$command = escapeshellcmd("python3 mal.py");
$output = shell_exec($command);
echo $output;
var_dump($output);
$co = shell_exec("python3 mal.py");

var_dump($co);

//header('location:GenerateChallan.php');
?>