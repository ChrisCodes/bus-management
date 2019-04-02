<?php


  include("include/header-include.php");


  // check session
  if((isset($_SESSION['admin']))) {


  	// redirect to login/signup page
  	header('Location: ' . $root_url . "buses.php");


  }  else if(isset($_SESSION['customer'])){


    echo "You're logged in as customer. <a href='" . $root_url . "logout.php'>Log out</a> first then try again.";


  } else {




?>


<html>

<head>

    <title>BeTech - Admin Register</title>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <?php

    include("include/head.php");

    ?>



</head>

<body>


  <!-- Navigation -->
  <?php

  include("include/navigation.php");

  ?>



<div class="container-fluid account-page">

  <div class="container">

  <div class="account-wrapper">

    <div class="account-action-title">
      <span><h5><strong>BETECH STAFF <span style="color: #30c777;">REGISTER</span></strong></h5></span>
    </div>

    <form class="login-register-form" method="POST" action="account-script.php">





      <?php

      //---get the errors---
      $auth_errors;
      // var_dump($_SESSION["login_errors"]);

      if(isset($_SESSION["register_errors"])) {

        $auth_errors = array();


        if(isset($_SESSION["register_errors"]["email"])) {

          $auth_errors["email"] = $_SESSION["register_errors"]["email"];

        }


        if(isset($_SESSION["register_errors"]["name"])) {

          $auth_errors["name"] = $_SESSION["register_errors"]["name"];

        }


        if(isset($_SESSION["register_errors"]["password"])) {

          $auth_errors["password"] = $_SESSION["register_errors"]["password"];
          
        }



        if(isset($_SESSION["register_errors"]["general"])) {

          $auth_errors["general"] = $_SESSION["register_errors"]["general"];
          
        }


      }





      $credentials;

      if(isset($_SESSION["register_credentials"])) {


        $credentials = array();


        if(isset($_SESSION["register_credentials"]["name"])) {

          $credentials["name"] = $_SESSION["register_credentials"]["name"];

        }


        if(isset($_SESSION["register_credentials"]["email"])) {

          $credentials["email"] = $_SESSION["register_credentials"]["email"];

        }



      }




      ?>








      <div class="input-group">
        <span class="field-label">Name</span>
        <input type="text" name="name" class="mat_input_field 
        <?php echo (isset($auth_errors['name'])) ? ' is-invalid' : ''; ?>" 
        value="<?php echo (isset($credentials['name'])? $credentials['name'] : ''); ?>" id="name" placeholder="Full name" />


        <?php 

        if (isset($auth_errors['name'])) {

        ?>
            <span class="invalid-feedback" role="alert">
                <?php echo $auth_errors['name']; ?>
            </span>
        
        <?php

        }

        ?>


      </div>



      <div class="input-group">
        <span class="field-label">Email</span>
        <input type="text" name="email" class="mat_input_field 
        <?php echo (isset($auth_errors['email'])) ? ' is-invalid' : ''; ?>" 
        value="<?php echo (isset($credentials['email'])? $credentials['email'] : ''); ?>" id="email" placeholder="Email address" />


        <?php 

        if (isset($auth_errors['email'])) {

        ?>
            <span class="invalid-feedback" role="alert">
                <?php echo $auth_errors['email']; ?>
            </span>
        
        <?php

        }

        ?>


      </div>







      <div class="input-group">
        <span class="field-label">Set password</span>
        <input type="text" name="password" class="mat_input_field <?php echo (isset($auth_errors['password']) ? ' is-invalid' : ''); ?>"" id="password" placeholder="Account password" />


        <?php 

        if (isset($auth_errors['password'])) {

        ?>
            <span class="invalid-feedback" role="alert">
                <?php echo $auth_errors['password']; ?>
            </span>
        
        <?php

        }

        ?>

      </div>



      <div class="input-group">
        <input type="submit" name="register" class="btn btn-primary" id="login-button" value="REGISTER" />
      </div>


      <?php

      if(isset($auth_errors["general"])) {

      ?>
      <div class="input-group">
      <span class="invalid-feedback"><?php echo $auth_errors["general"]; ?></span>
      </div>

      <?php

      }

      ?>


    </form>

    <div class="container-fluid account-instructions">
      <div class="row">

        <div class="col-md-12"><p>Have an account? <a href="login.php" class="link"> Log in</a></p></div>

      </div>
    </div>

  </div>
  <!--  end of account-wrapper -->

  </div>
   <!-- End of container  -->

</div>
 <!-- end of container fluid -->






<?php

//include("notification.php");
// include("include/footer.php");

?>


</body>

</html>

<?php


}


?>