<?php

  include("include/header-include.php");

?>


<html>

<head>

    <title>BeTech - Buses</title>

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
          <h2 style="color: #fff;">Buses</h2>
      </div>

  </div>

  </div>



  <div class="main-body buses">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">

        <?php

          if(isset($_SESSION["admin"])) {

        ?>
        
        <a href="<?php echo($root_url); ?>admin/add-bus.php" class="btn btn-primary">ADD NEW BUS</a>

        <?php

          }



          if(isset($_GET["route-id"])) {


             $r_id = (int) $_GET["route-id"];

              // get route
              $r = mysqli_query($connection, "SELECT * FROM routes WHERE id = '$r_id'");
              $r = mysqli_fetch_array($r);
          ?>


          <h4><?php echo $r["departure"] . " - " . $r["destination"]; ?> buses</h4>
          <p><a href="<?php echo $root_url . 'buses.php'; ?>">All routes</a></p>



          <?php

          }

        ?>

      </div>



      <div class="row">


       <?php

        // get all buses
        $buses_q = "SELECT * FROM buses ";

        if(isset($_GET['route-id'])) {

          $rid = $_GET['route-id'];

          $buses_q .= " WHERE route = '$rid' ORDER BY id DESC";

        } else {

          $buses_q .= " WHERE 1 ORDER BY id DESC";

        }

        // echo $buses_q;


        $get = mysqli_query($connection, $buses_q);

        if(mysqli_num_rows($get) > 0) {

           while($bus = mysqli_fetch_array($get)) {

        ?>


        <div class="col-xs-12 col-sm-6 col-md-3">

          <div class="one-bus">

            <div class="bus-details-box">
              <div class="bus-details-inner" style="background: url('<?php echo $bus["image"]; ?>'); -webkit-background-size: cover;
       -o-background-size: cover;
          background-size: cover;
  background-position: center;">
                <div class="bus-details-slide">
                  <p><?php echo $bus["name"]; ?> | <?php echo $bus["plate"]; ?></p>
                </div>
              </div>
            </div>

            <div class="more-details">

              <?php

              $route_id = (int)$bus["route"];

              // get route
              $route = mysqli_query($connection, "SELECT * FROM routes WHERE id = '$route_id'");
              $route = mysqli_fetch_array($route);


              ?>


              <p><?php echo $route["departure"] ." - " . $route["destination"]; ?></p>
              <p>Ksh. <?php echo $route["fare"]; ?></p>


              <?php

              // get remaining seats
              $bus_id = $bus["id"];
              $rem_q = "SELECT * FROM seats WHERE bus_id = '$bus_id' AND booking = 'empty-seat'";
              $rem = mysqli_query($connection, $rem_q);

              $rem_seats = mysqli_num_rows($rem);

              ?>


              <p><?php echo $rem_seats; ?> seats rem.</p>



              <?php

                if(isset($_SESSION["admin"])) {

              ?>
              
              <a href="<?php echo($root_url); ?>admin/bookings.php?bus-id=<?php echo $bus["id"]; ?>" class="btn btn-primary">View Bookings</a>

              <?php

                } else {

              ?>

              <a href="<?php echo $root_url; ?>customer/book.php?bus-id=<?php echo $bus["id"]; ?>" class="btn btn-primary" >Book Now</a>


              <?php

                }

              ?>


            </div>

          </div>

          
        </div>



        <?php

            }



        } else {



          if(isset($_GET['route-id'])) {

       ?>



       <p>No buses found for route. <a href="<?php echo $root_url; ?>buses.php">See all buses</a></p>



      <?php

          } else {

       ?>



       <p>No buses found. <a href="<?php echo $root_url; ?>admin/add-bus.php">Add new</a></p>



      <?php


          }


        }


      ?>

      </div>


          
    <?php


    include($root_path . "include/footer.php");


    ?>  
     
    </body>


</html>