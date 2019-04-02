

<div class="site-header">

<div class="container">

<a href="<?php echo $root_url; ?>index.php">
    <img class="site-logo" src="<?php echo $root_url; ?>images/icons/betech_logo.png" />
</a>


<!-- Search form -->
<!-- <form action="search.php" class="search_form">
    <div class="search_div">
        <input type="text" placeholder="Search" class="search_box smooth_corner">
    </div>
</form> -->
<!-- Search form -->




<!-- Desktop Navigation -->
<div class="desk_nav_wrapper">
    <ul class="list-unstyled list-inline desk_nav">
        <a href="">
            <li class="desk_menu user_menu">
                <img src="<?php echo $root_url; ?>images/icons/user_icon.png" alt="User Image" class="img-responsive nav_profile_pic" />

                <!-- Secondary drop menu -->
                <ul class="list-unstyled drop_nav smooth_corner">


                    <?php


                    if(isset($_SESSION['admin'])) {


                      // get logged in admin
                      $id = $_SESSION['admin'];

                      $get_q = "SELECT * FROM admins WHERE id = '$id'";
                      $admin = mysqli_query($connection, $get_q);


                      if($admin) {

                          $admin = mysqli_fetch_array($admin);
                          $admin = $admin["name"];

                          $name_array = explode(" ", $admin);
                          $first_name = $name_array[0];
                      }


                    ?>


                    <!-- Admin Drop Navigation -->

                    <div class="drop_head">
                    <a href="">
                        <li class="drop_menu_item"><small>Welcome</small></li>
                    </a>
                    <a href="">
                        <li class="drop_menu_item"><strong><?php echo $first_name; ?></strong></li>
                    </a>
                    </div>



                    <div class="drop_body">

                    <a href="<?php echo $root_url; ?>buses.php">
                        <li class="drop_menu_item">Bookings</li>
                    </a>

                    <a href="<?php echo $root_url; ?>customers.php">
                        <li class="drop_menu_item">Customers</li>
                    </a>


                    <a href="<?php echo $root_url; ?>buses.php">
                        <li class="drop_menu_item">Buses</li>
                    </a>

                    <a href="<?php echo $root_url; ?>routes.php">
                        <li class="drop_menu_item">Routes</li>
                    </a>



                     <a href="<?php echo $root_url; ?>logout.php">
                        <li class="drop_menu_item">Log out</li>
                    </a>


                    </div>






                    <?php




                    } else if(isset($_SESSION["customer"])) {


                      // get logged in customer
                      $id = $_SESSION['customer'];

                      $get_q = "SELECT * FROM customers WHERE id = '$id'";
                      $admin = mysqli_query($connection, $get_q);


                      if($admin) {

                          $admin = mysqli_fetch_array($admin);
                          $admin = $admin["name"];

                          $name_array = explode(" ", $admin);
                          $first_name = $name_array[0];
                      }


                    ?>


                    <!-- Admin Drop Navigation -->

                    <div class="drop_head">
                    <a href="">
                        <li class="drop_menu_item"><small>Welcome</small></li>
                    </a>
                    <a href="">
                        <li class="drop_menu_item"><strong><?php echo $first_name; ?></strong></li>
                    </a>
                    </div>



                    <div class="drop_body">

                    <a href="<?php echo $root_url; ?>buses.php">
                        <li class="drop_menu_item">Dashboard</li>
                    </a>


                    <a href="<?php echo $root_url; ?>customer/bookings.php">
                        <li class="drop_menu_item">Bookings</li>
                    </a>


                     <a href="<?php echo $root_url; ?>logout.php">
                        <li class="drop_menu_item">Log out</li>
                    </a>

                    </div>



                    <?php



                    } else {

                    ?>





                    <!-- Logged out Drop Navigation -->

                    <div class="drop_head">
                    <a href="">
                        <li class="drop_menu_item"><small>Accounts</small></li>
                    </a>
        
                    </div>



                    <div class="drop_body">

                    <a href="<?php echo $root_url; ?>customer-login.php">
                        <li class="drop_menu_item">Customers</li>
                    </a>


                     <a href="<?php echo $root_url; ?>login.php">
                        <li class="drop_menu_item">Admins</li>
                    </a>

                    </div>





                    <?php


                    }




                    ?>



                </ul>

                <!-- Secondary drop menu -->

            </li>
        </a>

        <a href="<?php echo $root_url; ?>contact-us.php">
            <li class="desk_menu">Contact us</li>
        </a>
        <a href="<?php echo $root_url; ?>about-us.php">
            <li class="desk_menu">About us</li>
        </a>
    

        <li class="desk_menu">Travel



            <!-- Secondary drop menu -->
            <ul class="list-unstyled drop_nav smooth_corner">


                <div class="drop_head">
                    <li class="drop_menu_item"><small>Travel with us</small></li>
                </div>



                <div class="drop_body">

                <a href="<?php echo $root_url; ?>buses.php">
                    <li class="drop_menu_item">Buses</li>
                </a>

                <a href="<?php echo $root_url; ?>routes.php">
                    <li class="drop_menu_item">Routes</li>
                </a>



                <?php


                if(!isset($_SESSION["admin"]) && !isset($_SESSION["customer"])) {


                ?>


                <a href="<?php echo $root_url; ?>customer-login.php">
                    <li class="drop_menu_item">Log in</li>
                </a>



                <?php

                }


                ?>

                </div>


            </ul>

            <!-- Secondary drop menu -->


        </li>

        <a href="<?php echo $root_url; ?>login.php">
            <li class="desk_menu">Admin/Workers</li>
        </a>
    </ul>
</div>

<!-- Desktop Navigation -->






</div>
</div>


</div>


<div class="clear-nav"></div>


<script>

var uiswitch = 0;

$('#desk-search-icon').click(function(){
    if(uiswitch==0){

     $('#desk-search').css("height","auto");

     $('#desk-search').css("opacity","1");
     $('#desk-search').css("padding-top","40px");
     $('#desk-search').css("padding-bottom","40px");

     $('#desk-search-icon').attr("src","images/icons/xicon.png");

      uiswitch++;
     
    } else{

     $('#desk-search').css("height","0px");

      $('#desk-search').css("opacity","0");
     $('#desk-search').css("padding-top","0px");
     $('#desk-search').css("padding-bottom","0px");

     $('#desk-search-icon').attr("src","images/icons/sicon.png");
    
    uiswitch = 0;
    }
   
});






var menuswitch = 0;

$('#mobile-menu-icon').click(function(){
    if(menuswitch==0){

     $('#mobile-nav').css("height","auto");
     $('#mobile-nav').css("padding","20px 0px");
      $('#mobile-nav').css("padding-top","30px");
      $('#mobile-nav').css("opacity","1");
     $('#mobile-menu-icon').attr("src","images/icons/xicon.png");

      menuswitch++;
     
    } else{

   $('#mobile-nav').css("height","0px");
     $('#mobile-nav').css("padding","0px 0px");
     $('#mobile-nav').css("padding-top","0px");
         $('#mobile-nav').css("opacity","0");

     $('#mobile-menu-icon').attr("src","images/icons/mmicon.png");
    menuswitch = 0;
    }
   
});


</script>