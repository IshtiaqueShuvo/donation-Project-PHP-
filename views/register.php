<?php
if(!isset($_SESSION)) session_start();

$ressourceRoot = dirname($_SERVER['PHP_SELF']);
$ressourceRoot = explode('/',$ressourceRoot);

$ressourceRoot = $ressourceRoot[1];
include_once("../includes/head_auth.php")
?>

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
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
          ?>
        <form action="authentication/registration_process.php" method="post">
            <div class="form-group">
                <div class="form-row">
                    <div class="col-md-6">
                        <div class="form-label-group">
                            <select class="form-control" name="userType" id="user-type">
                                <option value="-">Select User Type</option>
                                <option value="cloth_donator">Cloth Donator</option>
                                <option value="money_donator">Money Donator</option>
                                <option value="food_donator">Food Donator</option>
                                <option value="blood_donator">Blood Donator</option>
                                <option value="user">User</option>
<!--                                <option value="volunteer">Volunteer</option>-->
                            </select>
<!--                            <label for="user-type">Name</label>-->
                        </div>
                    </div>

                </div>
            </div>

          <div class="form-group">
            <div class="form-row">

                <div class="col-md-6">
                    <div class="form-label-group">
                        <input type="text" id="firstName" class="form-control" placeholder="First name" name="name" required>
                        <label for="firstName">Name</label>
                    </div>
                </div>


              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="text" id="contact-number" class="form-control" placeholder="Last name" name="contactNumber" required>
                  <label for="contact-number">Contact Number</label>
                </div>
              </div>
            </div>
          </div>

            <div class="form-group">
                <div class="form-label-group">
                    <textarea class="form-control" name="address" id="address" placeholder="Enter your address"></textarea>
<!--                    <label for="address">Email address</label>-->
                </div>
            </div>

          <div class="form-group">
            <div class="form-label-group">
              <input type="email" id="inputEmail" class="form-control" placeholder="Email address" name="email" required>
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <div class="form-label-group">
                  <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required>
                  <label for="inputPassword">Password</label>
                </div>
              </div>
<!--              <div class="col-md-6">-->
<!--                <div class="form-label-group">-->
<!--                  <input type="password" id="confirmPassword" class="form-control" placeholder="Confirm password">-->
<!--                  <label for="confirmPassword">Confirm password</label>-->
<!--                </div>-->
<!--              </div>-->
            </div>
          </div>

            <input type="submit" class="btn btn-primary btn-block" name="register" value="Register">
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Already registered? Login here...</a>
        </div>
      </div>
    </div>
  </div>


<?php
include_once ("../includes/foot_auth.php");
?>
