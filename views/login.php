<?php
if(!isset($_SESSION)) session_start();

$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];
include_once("../includes/head_auth.php")
?>

  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
          <?php
          if(isset($_SESSION['tokenUpdated'])){
              echo $_SESSION['tokenUpdated'];
              unset($_SESSION['tokenUpdated']);
          }
          if(isset($_SESSION['loginErrors'])){
              echo $_SESSION['loginErrors'];
              unset($_SESSION['loginErrors']);
          }

          if(isset($_SESSION['somethingWrong'])){
              echo $_SESSION['somethingWrong'];
              unset($_SESSION['somethingWrong']);
          }

          if(isset($_SESSION['activationSuccess'])){
              echo $_SESSION['activationSuccess'];
              unset($_SESSION['activationSuccess']);
          }
          ?>
        <form action="authentication/login_process.php" method="post">
          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email">
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <input class="btn btn-primary btn-block" type="submit" name="login" value="Login">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
        </div>
      </div>
    </div>
  </div>

<?php
include_once ("../includes/foot_auth.php");
?>
