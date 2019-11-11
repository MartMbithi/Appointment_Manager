<!-- Server side code for log in-->
<?php
    session_start();
    include('assets/inc/config.php');//get configuration file
    if(isset($_POST['client_login']))
    {
      $c_email=$_POST['c_email'];
      $c_pwd=($_POST['c_pwd']);//double encrypt to increase security
      $stmt=$mysqli->prepare("SELECT c_email, c_pwd, c_id FROM ams_client WHERE c_email=? and c_pwd=? ");//sql to log in user
      $stmt->bind_param('ss',$c_email,$c_pwd);//bind fetched parameters
      $stmt->execute();//execute bind
      $stmt -> bind_result($c_email,$c_pwd,$c_id);//bind result
      $rs=$stmt->fetch();
      $_SESSION['c_id']=$c_id;//assaign session to passenger id
      //$uip=$_SERVER['REMOTE_ADDR'];
      //$ldate=date('d/m/Y h:i:s', time());
      if($rs)
      {//if its sucessfull
        header("location:client-dashboard.php");
      }

      else
      {
      #echo "<script>alert('Access Denied Please Check Your Credentials');</script>";
      $error = "Access Denied Please Check Your Credentials";
      }
  }
?>
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Appointment Management System</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
    <!--Trigger Sweet Alert-->
    <?php if(isset($error)) {?>
  <!--This code for injecting an alert-->
      <script>
            setTimeout(function () 
            { 
              swal("Failed!","<?php echo $error;?>!","error");
            },
              100);
      </script>
					
			<?php } ?>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header"><img class="logo-img" src="assets/img/logo-xx.png" alt="logo" width="{conf.logoWidth}" height="27"><span class="splash-description">Please enter your user information.</span></div>
              <div class="card-body">

              <!--Login Form-->
                <form method ="POST">
                  <div class="login-form ">

                    <div class="form-group">
                      <input class="form-control" name="c_email" type="text" placeholder="Email" autocomplete="off">
                    </div>

                    <div class="form-group">
                      <input class="form-control" name="c_pwd" type="password" placeholder="Password">
                    </div>

                    <div class="form-group row login-tools">
                      
                      <div class="col-6 login-forgot-password"><a href="client-pwd-forgot.php">Forgot Password?</a></div>
                    </div>

                    <div class="form-group row login-submit">
                      <div class="col-6"><a class="btn btn-secondary btn-xl" href="client-signup.php">Register</a></div>
                      <div class="col-6"><input type = "submit" name ="client_login" class="btn btn-primary btn-xl" value ="Log In"></div>
                    </div>
                    
                  </div>
                </form>
                <!--End Login-->
              </div>
            </div>
            <div class="splash-footer"><a href = "index.php">Home</a></div>

            <div class="splash-footer">&copy; 2019 - <?php echo date ('Y');?> Orion Railway Reservation System | Powered By <a href = "https://martmbithi.github.io" target ="_blank" >MartDevelopers</a></div>
          </div>
        </div>
      </div>
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/js/swal.js"></script>

    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>

</html>