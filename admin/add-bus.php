<?php

  include("../include/header-include.php");


  if(isset($_SESSION["admin"])) {

 
?>


<html>

<head>

    <title>BeTech - New Bus</title>

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
          <h2 style="color: #fff;">Add new bus</h2>
      </div>

  </div>

  </div>



  <div class="main-body routes">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">


      </div>


      <div class="row">
        <div class="col-sm-6">


          <form method="POST" action="<?php echo $root_url; ?>admin/bus-script.php" enctype="multipart/form-data" >
            

            <?php

            //---get the errors---
            $bus_errors;
            // var_dump($_SESSION["login_errors"]);

            if(isset($_SESSION["bus_errors"])) {


              $bus_errors = array();


              if(isset($_SESSION["bus_errors"]["name"])) {

                $bus_errors["name"] = $_SESSION["bus_errors"]["name"];

              }



              if(isset($_SESSION["bus_errors"]["plate"])) {

                $bus_errors["plate"] = $_SESSION["bus_errors"]["plate"];
                
              }







              if(isset($_SESSION["bus_errors"]["route"])) {

                $bus_errors["route"] = $_SESSION["bus_errors"]["route"];
                
              }





            if(isset($_SESSION["bus_errors"]["seats"])) {

              $bus_errors["seats"] = $_SESSION["bus_errors"]["seats"];
              
            }




            if(isset($_SESSION["bus_errors"]["photo"])) {

              $bus_errors["photo"] = $_SESSION["bus_errors"]["photo"];
              
            }







            }





            $credentials;

            if(isset($_SESSION["bus_credentials"])) {


              $credentials = array();


              if(isset($_SESSION["bus_credentials"]["name"])) {

                $credentials["name"] = $_SESSION["bus_credentials"]["name"];

              }



              if(isset($_SESSION["bus_credentials"]["plate"])) {

                $credentials["plate"] = $_SESSION["bus_credentials"]["plate"];

              }




              if(isset($_SESSION["bus_credentials"]["route"])) {

                $credentials["route"] = $_SESSION["bus_credentials"]["route"];

              }





              if(isset($_SESSION["bus_credentials"]["seats"])) {

                $credentials["seats"] = $_SESSION["bus_credentials"]["seats"];

              }





            }




            ?>




          <div class="input-group">
            <span class="field-label">Bus name *</span>
            <input type="text" name="name" class="mat_input_field <?php echo (isset($bus_errors['name'])) ? ' is-invalid' : ''; ?>" value="<?php echo (isset($credentials['name'])? $credentials['name'] : ''); ?>" id="name" placeholder="Name" />




            <?php 

            if (isset($bus_errors['name'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $bus_errors['name']; ?>
                </span>
            
            <?php

            }

            ?>

          </div>






          <div class="input-group">
            <span class="field-label">Plate No. *</span>
            <input type="text" name="plate" class="mat_input_field <?php echo (isset($bus_errors['plate'])) ? ' is-invalid' : ''; ?>" value="<?php echo (isset($credentials['plate'])? $credentials['plate'] : ''); ?>" id="plate" placeholder="Plate" />




            <?php 

            if (isset($bus_errors['plate'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $bus_errors['plate']; ?>
                </span>
            
            <?php

            }

            ?>

          </div>







          <div class="input-group">
          <span class="field-label">Bus route</span>
          <select name="route" class="mat_input_field">
            <?php

            $r_q = "SELECT * FROM routes WHERE 1";
            $routes = mysqli_query($connection, $r_q);

            if(mysqli_num_rows($routes) > 0) {


              while($route = mysqli_fetch_array($routes)) {


            ?>
            <option value="

            <?php 

            echo $route["id"]; 

            ?>

            "

            <?php

            if(isset($credentials["route"]) && (int)$credentials["route"] == (int)$route["id"] ) {

            ?>

            selected = "selected"

            <?php

            }


            ?>

            >

            <?php echo $route["departure"]. " - " . $route["destination"]; ?>
              
            </option>

            <?php

              }

            } else {

            ?>

            <option value="">No routes found</option>

            <?php


            }


            ?>
          </select>



          <?php 

          if (isset($bus_errors['route'])) {

          ?>
              <span class="invalid-feedback" role="alert">
                  <?php echo $bus_errors['route']; ?>
              </span>
          
          <?php

          }

          ?>



      </div>





  

          <div class="input-group">
            <span class="field-label">Seats *</span>
            <input type="number" name="seats" class="mat_input_field  
            <?php echo (isset($bus_errors['seats'])) ? ' is-invalid' : ''; ?>" 
            value="<?php echo (isset($credentials['seats'])? $credentials['seats'] : ''); ?>" 
            id="destination" placeholder="No of seats" />


            <?php 

            if (isset($bus_errors['seats'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $bus_errors['seats']; ?>
                </span>
            
            <?php

            }

            ?>



          </div>


     

            <div class="input-group">

            <div class="uploadbody <?php echo (isset($bus_errors['photo'])) ? ' is-invalid' : ''; ?>">
            <p id="sf">Upload bus photo</p>
            <input type="file" name="photo" id="rfu" />
            </div>



            <?php 

            if (isset($bus_errors['photo'])) {

            ?>
                <span class="invalid-feedback" role="alert">
                    <?php echo $bus_errors['photo']; ?>
                </span>
            
            <?php

            }

            ?>





            <script>

             document.getElementById("rfu").onchange = function () {
              
              var fullfilename  = this.value;
              var substringval  = fullfilename.substring(fullfilename.lastIndexOf("\\")+1, fullfilename.length);
              document.getElementById("sf").innerHTML = substringval;
              
              if(this.value==""){
                 document.getElementById("sf").innerHTML = "No file selected";
              }
            };

            </script>



          </div>



          <div class="input-group">
           <input type="submit" class="btn btn-primary" name="add-bus" value="ADD BUS" />
          </div>




          </form>




          <?php 




          if (isset( $_SESSION['bus_errors']["general"])) {

          ?>

              <p class="text-danger">
                <?php echo $_SESSION['bus_errors']["general"]; ?>
              </p>

          
          <?php


          unset($_SESSION['bus_errors']);


          }







          if (isset( $_SESSION['bus_success'])) {



          $success_messages = $_SESSION['bus_success'];


            for($i = 0; $i < sizeof($success_messages); $i++) {

          ?>

              <p class="text-success">
                <?php echo $success_messages[$i]; ?>
              </p>

          
          <?php

            }


            unset($_SESSION['bus_success']);



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