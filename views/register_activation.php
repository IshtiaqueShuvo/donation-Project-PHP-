<?php
if(!isset($_SESSION)) session_start();

$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];
include_once("../includes/head_auth.php")
?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Activate Your Account</div>
      <div class="card-body">
          <?php
          if(isset($_SESSION['registrationSuccess'])){
              echo $_SESSION['registrationSuccess'];
              unset($_SESSION['registrationSuccess']);
          }


          if(isset($_SESSION['registrationNotice'])){
              echo $_SESSION['registrationNotice'];
              unset($_SESSION['registrationNotice']);
          }

          if(isset($_SESSION['activationSuccess'])){
              echo $_SESSION['activationSuccess'];
              unset($_SESSION['activationSuccess']);
          }
          ?>
          <form action="authentication/email_verification.php" method="post">
              <div class="form-group">
                  <label>Activation code:</label>
                  <input type="text" class="form-control" name="email_token">
              </div>

              <input class="btn btn-primary btn-block" type="submit" name="activation" value="Activate">
          </form>
      </div>
    </div>
  </div>


<?php
include_once ("../includes/foot_auth.php");
?>
