<?php

  include("../include/header-include.php");

?>


<html>

<head>

    <title>BeTech - My Bookings</title>

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



  <div class="pull-left w-100" style="width:100%; background: url('../images/buses.jpeg'); background-size: cover; background-position: center; ">

  <div class="pull-left w-100" style="width:100%; padding:100px 0px 30px 0px; background: rgba(0,0,0,.7);">

      <div class="container">
          <h2 style="color: #fff;">My Bookings</h2>
      </div>

  </div>

  </div>



  <div class="main-body buses">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">

        <?php

          if(isset($_SESSION["customer"])) {

        ?>
        
        <a href="<?php echo($root_url); ?>routes.php" class="btn btn-primary">Book New</a>

        <?php

          }

        ?>

      </div>



      <div class="row">


       <?php

        // get all buses where customer has seat

       // select all seats, loop, fetch bus, get bus details
       $customer_id = $_SESSION["customer"];
       $seats_q = "SELECT * FROM seats WHERE booking = 'occupied' AND customer_id = '$customer_id' ";
       $seats = mysqli_query($connection, $seats_q);

       if(mysqli_num_rows($seats) > 0) {

        // loop over results
        while($seat = mysqli_fetch_array($seats)) {

          $bus_id = $seat["bus_id"];
          $buses_q = "SELECT * FROM buses WHERE id = '$bus_id'";
          $get = mysqli_query($connection, $buses_q);
          $bus = mysqli_fetch_array($get);

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
                    $rem_q = "SELECT * FROM seats WHERE bus_id = '$bus_id' AND booking = 'empty-seat'";
                    $rem = mysqli_query($connection, $rem_q);

                    $rem_seats = mysqli_num_rows($rem);

                    ?>


                    <p>Seat no. <?php echo $seat["seat_no"]; ?></p>





                  </div>

                </div>

                
              </div>





        <?php

        }



       } else {

        ?>


        <p>No buses booked. <a href="<?php echo $root_url; ?>/routes.php">Book a bus</a></p>



        <?php

        }


        ?>

      </div>


          
    <?php


    include($root_path . "include/footer.php");


    ?>  
     
    </body>


</html>