
<?php
    require_once("include/connection.php");
    if(!isset($_SESSION['id'])){
        header('location:index.php');
    }
    require_once("include/curl.php");
    @$url = 'http://35.232.126.157/api/fetchCleared.php/';
                               
    // function call curlcall($url,$content){  }
    @$response=curlcall($url);
        
?> 
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Cleared challans ::</title>

    <!-- Bootstrap CSS CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <!-- Our Custom CSS -->
    <link rel="stylesheet" href="style/style5.css">

    <!-- Font Awesome JS -->
   <link href="style/fontawesome-5.12.0-web/css/all.min.css" rel="stylesheet"> 

</head>

<body>

    <div class="wrapper">
        <!-- Sidebar Holder -->
        <nav id="sidebar">
            <div class="sidebar-header">
                <h3>-- Options --</h3>
            </div>

            <ul class="list-unstyled components">
                <li>
                    <a href="GenerateChallan.php">Generate Challan</a>
                </li>
                <li>
                    <a href="pending.php">Pending</a>
                </li>
                <li>
                    <a href="cleared.php">Cleared </a>
                </li>
                
                <!-- <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li> -->
            </ul>

           
        </nav>

        <!-- Page Content Holder -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">

                    <button type="button" id="sidebarCollapse" class="navbar-btn">
                        <span></span>
                        <span></span>
                        <span></span>
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="logout.php"><button class="btn ">Logout</button></a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </nav>        
            <div class="jumbotron">
            <table class="table table-striped table-hover">
                <thead>
                <tr>
                    <th>Sno</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Vehicle number</th>
                    <th>Contact</th>
                    <th>Status</th>
                </tr>
                </thead>
                <tbody>
                <?php foreach(@$response as $row){ ?>
                <tr>
                    <td><?= @$row['sno']; ?></td>
                    <td><?= @$row['name']; ?></td>
                    <td><?= @$row['email']; ?></td>
                    <td><?= @$row['numberplate']; ?></td>
                    <td><?= @$row['contact']; ?></td>
                    <td><?= @$row['status']; ?></td>
                </tr>
                <?php } ?>
                </tbody>
            </table>
            </div>
        </div>
        
    </div>
    <script>
    
    </script>
    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
                $(this).toggleClass('active');
            });
        });
        function myFunction() {
        var copyText = document.getElementById("myInput");
        copyText.select();
        copyText.setSelectionRange(0, 99999)
        document.execCommand("copy");
        alert("Copied the text: " + copyText.value);
        }
    </script>
   
</body>

</html>



