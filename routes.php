<?php

  include("include/header-include.php");
 
?>


<html>

<head>

    <title>BeTech - Routes</title>

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



  <div class="pull-left w-100" style="width:100%; background: url('images/street_coach.jpeg'); background-size: cover; background-position: center; ">

  <div class="pull-left w-100" style="width:100%; padding:100px 0px 30px 0px; background: rgba(0,0,0,.7);">

      <div class="container">
          <h2 style="color: #fff;">Routes</h2>
      </div>

  </div>

  </div>



  <div class="main-body routes">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">

        <?php

          if(isset($_SESSION["admin"])) {

        ?>
        
        <a href="<?php echo($root_url); ?>admin/add-route.php" class="btn btn-primary">ADD NEW ROUTE</a>

        <?php

          }

        ?>

      </div>


  <?php

  // get all routes
  $routes_q = "SELECT * FROM routes WHERE 1 ORDER BY id DESC";
  $get = mysqli_query($connection, $routes_q);

  if(mysqli_num_rows($get) > 0) {


  ?>

      <table class="table table-striped table-responsive table-hover">
        
        <tr>
          <th><strong>From</strong></th>
          <th><strong>To</strong></th>
          <th><strong>Fare</strong></th>
          <th><strong>Rem. Seats</strong></th>

          <?php

            if(!isset($_SESSION["admin"])) {

          ?>
          <th class="book-column"><strong>Book<strong></th>
          <?php

            }

          ?>

        </tr>

  <?php

    while($route = mysqli_fetch_array($get)) {

  ?>


      <tr>
        <td><?php echo $route["departure"]; ?></td>
        <td><?php echo $route["destination"]; ?></td>
        <td><?php echo $route["fare"]; ?></td>
        <td><?php //echo $route["fare"]; ?>10</td>


        <?php

          if(!isset($_SESSION["admin"])) {

        ?>

        <td class="book-column">

             <a href="<?php echo($root_url); ?>buses.php?route-id=<?php echo $route["id"]; ?>" class="btn btn-primary btn-xs">BOOK NOW</a>

        </td>

        <?php

          }

        ?>



      </tr>


  <?php

    }


  ?>


  </table>


  <?php

  } else {

  ?>


  <p>No routes found. <a href="<?php echo $root_url; ?>admin/add-route.php">Add new</a></p>



  <?php

  }


  ?>


 
          
    </div>
  </div>


          
    <?php


    include($root_path . "include/footer.php");


    ?>  
     
    </body>


</html>