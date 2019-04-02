<?php

  include("../include/header-include.php");


  if(isset($_SESSION["admin"])) {

 
?>


<html>

<head>

    <title>BeTech - New Route</title>

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



  <div class="pull-left w-100" style="width:100%; background: url('<?php echo $root_url; ?>images/street_coach.jpeg'); background-size: cover; background-position: center; ">

  <div class="pull-left w-100" style="width:100%; padding:100px 0px 30px 0px; background: rgba(0,0,0,.7);">

      <div class="container">
          <h2 style="color: #fff;">Add new route</h2>
      </div>

  </div>

  </div>



  <div class="main-body routes">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">


      </div>


      <div class="row">
        <div class="col-sm-6">


          <form method="POST" action="<?php echo $root_url; ?>admin/route-script.php" >
            

            <?php

            //---get the errors---
            $route_errors;
            // var_dump($_SESSION["login_errors"]);

            if(isset($_SESSION["route_errors"])) {

              $route_errors = array();

              if(isset($_SESSION["route_errors"]["departure"])) {

                $route_errors["departure"] = $_SESSION["route_errors"]["departure"];

              }



              if(isset($_SESSION["route_errors"]["destination"])) {

                $route_errors["destination"] = $_SESSION["route_errors"]["destination"];
                
              }







              if(isset($_SESSION["route_errors"]["fare"])) {

                $route_errors["fare"] = $_SESSION["route_errors"]["fare"];
                
              }






            }





            $credentials;

            if(isset($_SESSION["route_credentials"])) {


              $credentials = array();


              if(isset($_SESSION["route_credentials"]["departure"])) {

                $credentials["departure"] = $_SESSION["route_credentials"]["departure"];

              }



              if(isset($_SESSION["route_credentials"]["destination"])) {

                $credentials["destination"] = $_SESSION["route_credentials"]["destination"];

              }




              if(isset($_SESSION["route_credentials"]["fare"])) {

                $credentials["fare"] = $_SESSION["route_credentials"]["fare"];

              }





            }




            ?>




          <div class="input-group">
            <span class="field-label">Departure *</span>
            <input type="text" name="departure" class="mat_input_field <?php echo (isset($route_errors['departure'])) ? ' is-invalid' : ''; ?>" value="<?php echo (isset($credentials['departure'])? $credentials['departure'] : ''); ?>" id="departure" placeholder="From" />




            <?php 

            if (isset($route_errors['departure'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $route_errors['departure']; ?>
                </span>
            
            <?php

            }

            ?>

          </div>


  

          <div class="input-group">
            <span class="field-label">Destination *</span>
            <input type="text" name="destination" class="mat_input_field  
            <?php echo (isset($route_errors['destination'])) ? ' is-invalid' : ''; ?>" 
            value="<?php echo (isset($credentials['destination'])? $credentials['destination'] : ''); ?>" 
            id="destination" placeholder="To" />


            <?php 

            if (isset($route_errors['destination'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $route_errors['destination']; ?>
                </span>
            
            <?php

            }

            ?>



          </div>


     

          <div class="input-group">
            <span class="field-label">Fare (Ksh) *</span>
            <input type="text" name="fare" class="mat_input_field <?php echo (isset($route_errors['fare'])) ? ' is-invalid' : ''; ?>" value="<?php echo (isset($credentials['fare'])? $credentials['fare'] : ''); ?>" id="fare" placeholder="Bus fare" />


            <?php 

            if (isset($route_errors['fare'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $route_errors['fare']; ?>
                </span>
            
            <?php

            }

            ?>



          </div>



          <div class="input-group">
           <input type="submit" class="btn btn-primary" name="add-route" value="ADD ROUTE" />
          </div>




          </form>




          <?php 




          if (isset( $_SESSION['route_errors']["general"])) {

          ?>

              <p class="text-danger">
                <?php echo $_SESSION['route_errors']["general"]; ?>
              </p>

          
          <?php


          unset($_SESSION['route_errors']);


          }







          if (isset( $_SESSION['route_success'])) {



          $success_messages = $_SESSION['route_success'];


            for($i = 0; $i < sizeof($success_messages); $i++) {

          ?>

              <p class="text-success">
                <?php echo $success_messages[$i]; ?>
              </p>

          
          <?php

            }


            unset($_SESSION['route_success']);



          }



          




          ?>







        </div>
      </div>

      

          
    </div>
    </div>


          
    <?php


    include($root_path . "include/footer.php");


    ?>  
     
  </body>


</html>



<?php

} else {

  header("Location: " . $root_url . "login.php");

  
}


?>