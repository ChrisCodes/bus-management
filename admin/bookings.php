<?php

  include("../include/header-include.php");


  if(isset($_GET['bus-id']) && isset($_SESSION['admin'])) {


    // get bus information
    $bus_id = $_GET['bus-id'];
    $buses_q = "SELECT * FROM buses WHERE id = '$bus_id'";
    $get = mysqli_query($connection, $buses_q);
    $bus = mysqli_fetch_array($get);



    // get route information
    $route_id = (int)$bus["route"];

    // get route
    $route = mysqli_query($connection, "SELECT * FROM routes WHERE id = '$route_id'");
    $route = mysqli_fetch_array($route);

 
?>


<html>

<head>

    <title>BeTech - <?php echo $bus["name"]; ?> Bookings</title>

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



  <div class="pull-left w-100" style="width:100%; background: url('<?php echo $bus["image"]; ?>'); background-size: cover; background-position: center; ">

  <div class="pull-left w-100" style="width:100%; padding:100px 0px 30px 0px; background: rgba(0,0,0,.7);">

      <div class="container">
          <h2 style="color: #fff;"><?php echo $bus["name"]; ?> | <?php echo $bus["plate"]; ?> Bookings</h2>
      </div>

  </div>

  </div>


  <div class="main-body" style="background: #333; color: #fff; padding: 10px 0px 10px 0px; float: left; width: 100%;">
    <div class="container">
      <div class="row">

        <div class="col-md-3">
          <h4><strong>Route</strong></h4>
          <p><?php echo $route["departure"] ." - " . $route["destination"]; ?></p>
            
        </div>


        <div class="col-md-3">

          <h4><strong>Bus Fare</strong></h4>
          <p><?php echo $route["fare"]; ?></p>
          
        </div>


      </div>
    </div>
  </div>



  <div class="main-body routes">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">

      </div>


  <?php

  // get all booked customers
  $seats_q = "SELECT * FROM seats WHERE booking = 'occupied' AND bus_id = '$bus_id' ";
  $seats = mysqli_query($connection, $seats_q);

  if(mysqli_num_rows($seats) > 0) {


  ?>

      <table class="table table-striped table-responsive table-hover">
        
        <tr>
          <th><strong>Name</strong></th>
          <th><strong>Email</strong></th>
          <th><strong>Seat No</strong></th>

        </tr>

  <?php

    while($seat = mysqli_fetch_array($seats)) {

      // get customer name
      $customer_id = $seat["customer_id"];
      $c_q = "SELECT * FROM customers WHERE id = '$customer_id' ";
      $customer = mysqli_query($connection, $c_q);
      $customer = mysqli_fetch_array($customer);

  ?>


      <tr>
        <td><?php echo $customer["name"]; ?></td>
        <td><?php echo $customer["email"]; ?></td>
        <td><?php echo $seat["seat_no"]; ?></td>

      </tr>


  <?php

    }


  ?>


  </table>


  <?php

  } else {

  ?>


  <p>No bookings found.</p>



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


<?php


} else {


  header("Location: " . $root_url . "buses.php");


}



?>