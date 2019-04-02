<?php

  include("include/header-include.php");

?>




 <!DOCTYPE ht ml>
<html lang="en">

<head>

    <title>BeTech Bus Management Limited</title>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    


    <?php

    include($root_path . "include/head.php");

    ?>
    

</head>

<body>


   
    <!-- Navigation -->
    <?php

    include($root_path . "include/navigation.php");

    ?>



    <!-- Main content -->

    <div class="background-container">

        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-4 one-strip blank"></div>
                <div class="col-xs-12 col-sm-12 col-md-4 one-strip customer">
                    <h1><strong>I'm a customer</strong></h1>
                    <h4>Welcome to BeTech.</h4>
                    <br>
                    <a href="customer-login.php" class="btn btn-default btn-lg">Let's Travel</a>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-4 one-strip admin">
                    <h1><strong>I'm an Admin</strong></h1>
                    <h4>Manage your buses.</h4>
                    <br>
                    <a href="customer-login.php" class="btn btn-primary btn-lg">Manage Buses</a>
                </div>
            </div>
        </div>
        
    </div>
 

    <!-- Footer -->
    <footer>

    </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
        crossorigin="anonymous"></script>


</body>

</html>