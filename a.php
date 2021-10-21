<?php
require_once("include/connection.php");
require_once("include/curl_call.php");

?> 

<html>
    <head>

        <title>Demo</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">


        <?php include 'include/links.php'; ?>

    </head>
    <body>

        <div class="d-none d-sm-block">
            <nav class="navbar navbar-expand-md bg-light navbar-light fixed-top shadow mb-5 bg-white " id="scrollAnimaTop">
               <!-- Brand/logo -->
               <a class="navbar-brand pl-5 font-1000 labcolor" href="index.php" id="logo">Challan_Gen.</a>
               <!-- Links -->
               <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                     <span class="navbar-toggler-icon"></span>
               </button>
               <div class="collapse navbar-collapse" id="collapsibleNavbar">
                  <ul class="navbar-nav ml-auto p-1 pr-5 ">
                  <?php if(isset($_SESSION['id'])){ ?>
                        <li class="nav-item">
                        <a class="btn nav-link pl-4 pr-4 " href="logout.php"  data-target=".navbar-collapse.show" ><i class="fas fa-lock icon_hov "><i class="topNav" id="linksAnima">&nbsp;Logout</i></i></a>
                     </li>
                   <?php }else{ ?>  
                     <li class="nav-item">
                        <a class="btn nav-link pl-4 pr-4 " href="login.php"  data-target=".navbar-collapse.show" ><i class="fas fa-lock icon_hov "><i class="topNav" id="linksAnima">&nbsp;Login</i></i></a>
                     </li>
                     <?php } ?> 
                  </ul>
               </div>
            </nav>
         </div>
         
         
    </body>
</html>