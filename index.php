<?php
require_once("include/connection.php");

if(isset($_SESSION['id'])){
header('location:GenerateChallan.php');
}
?>
<!DOCTYPE html>

<html>
    <head>

        <title>loginn ::</title>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=0">

        <?php include 'include/links.php'; ?>


        <style>.form-control {display: inline;width: auto;}</style>   

    </head>
    <!-- recheck -->
    <body>
    <img class="wave" src="img/wave.png">
        <!-- desktop View -->
        <div class="d-none d-sm-block ">
        <div class="d-none d-sm-block">
        <!-- <img class="ml-logo" src="include/logo.png"> -->
        </div>
        <div class=" container a jum">
            <h4 class="green" ><?= @$_GET['message']; ?></h4>
            <div style="display: flex;" class="mt-5">
            <img src="img/avatar.svg" class="im">
            </div>
            <br>
            <form  method="POST" action="loginAPI.php" class="needs-validation" novalidate >
                <div class="form-group p-2 ml-3">
                    <label for="name"><i class="fas fa-user fa-1x"></i>&nbsp; </label>
                    <input type="email" class="form-control input_line " id="email" placeholder="Enter Email / phone"  name="email"  required>
                </div>
                <div class="form-group p-2 ml-3">
                    <label for="pwd"><i class="fas fa-unlock fa-1x"></i>&nbsp; </label>
                    <input type="password" class="form-control input_line"   id="field" placeholder="Enter password" name="pass"  required><span class="fa fa-fw fa-eye field-icon toggle-password"></span>
                </div>
                <div class="form-group form-check form-inline">
                    
                    <p class="red font-600 ml-5 mt-3" ><?= @$_GET['error'] ?></p>
                </div>
                <input type="submit" class="btn btn-outline-labs btn-s1 mt-3 mr-2 b-2 btn-block" value="Login">
            </form>
        </div>
        </div>

    </body>

    <script>
            
        $(".toggle-password,.toggle-passwords").click(function() {
        $(this).toggleClass("fa-eye fa-eye-slash");
        var y = document.getElementById("field");
        if (y.type === "password") {
            y.type= "text";
        } else {
            y.type="password";
        }
        }); 
    </script>
    <script>
         
        (function() {
            'use strict';
           // Disable form submissions if there are invalid fields
            window.addEventListener('load', function() {
            // Get the forms we want to add validation styles to
            var forms = document.getElementsByClassName('needs-validation');
            // Loop over them and prevent submission
            var validation = Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                form.classList.add('was-validated');
                }, false);
            });
            }, false);
        })();
      
   </script>

</html>


