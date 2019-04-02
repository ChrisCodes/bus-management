<?php

  include("include/header-include.php");


  if(isset($_SESSION['admin'])) {

 
?>


<html>

<head>

    <title>BeTech - All Customers</title>

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



  <div class="pull-left w-100" style="width:100%; background: url('images/buses.jpeg'); background-size: cover; background-position: center; ">

  <div class="pull-left w-100" style="width:100%; padding:100px 0px 30px 0px; background: rgba(0,0,0,.7);">

      <div class="container">
          <h2 style="color: #fff;">All Customers</h2>
      </div>

  </div>

  </div>





  <div class="main-body routes">
    <div class="container">

      <div class="pull-left" style="float: left; width: 100%; padding: 20px 0px;">

      </div>


  <?php

  // get all booked customers
  $c_q = "SELECT * FROM customers WHERE 1 ORDER BY id DESC ";
  $customers = mysqli_query($connection, $c_q);

  if(mysqli_num_rows($customers) > 0) {


  ?>

      <table class="table table-striped table-responsive table-hover">
        
        <tr>
          <th><strong>Name</strong></th>
          <th><strong>Email</strong></th>
          <th><strong>Password</strong></th>
        </tr>

  <?php

    while($customer = mysqli_fetch_array($customers)) {

  ?>


      <tr>
        <td><?php echo $customer["name"]; ?></td>
        <td><?php echo $customer["email"]; ?></td>
        <td><?php echo $customer["password"]; ?></td>

      </tr>


  <?php

    }


  ?>


  </table>


  <?php

  } else {

  ?>


  <p>No customers found.</p>



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