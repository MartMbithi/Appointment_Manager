<!--Server side code to handle passenger sign up-->
<?php
	session_start();
	include('assets/inc/config.php');
		if(isset($_POST['pass_register']))
		{
			$pass_fname=$_POST['pass_fname'];
			#$mname=$_POST['mname'];
			$pass_lname=$_POST['pass_lname'];
			$pass_phone=$_POST['pass_phone'];
			$pass_addr=$_POST['pass_addr'];
			$pass_uname=$_POST['pass_uname'];
			$pass_email=$_POST['pass_email'];
			$pass_pwd=sha1(md5($_POST['pass_pwd']));
      //sql to insert captured values
			$query="insert into orrs_passenger (pass_fname, pass_lname, pass_phone, pass_addr, pass_uname, pass_email, pass_pwd) values(?,?,?,?,?,?,?)";
			$stmt = $mysqli->prepare($query);
			$rc=$stmt->bind_param('sssssss',$pass_fname, $pass_lname, $pass_phone, $pass_addr, $pass_uname, $pass_email, $pass_pwd);
			$stmt->execute();
			/*
			*Use Sweet Alerts Instead Of This Fucked Up Javascript Alerts
			*echo"<script>alert('Successfully Created Account Proceed To Log In ');</script>";
			*/ 
			//declare a varible which will be passed to alert function
			if($stmt)
			{
				$success = "Created Account Proceed To Log In";
			}
			else {
				$err = "Please Try Again Or Try Later";
			}
			
			
		}
?>
<!--End Server Side-->
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="assets/img/favicon.ico">
    <title>Orion Railway Reservation System</title>
    <link rel="stylesheet" type="text/css" href="assets/lib/perfect-scrollbar/css/perfect-scrollbar.css"/>
    <link rel="stylesheet" type="text/css" href="assets/lib/material-design-icons/css/material-design-iconic-font.min.css"/>
    <link rel="stylesheet" href="assets/css/app.css" type="text/css"/>
  </head>
  <body class="be-splash-screen">
    <div class="be-wrapper be-login">
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="splash-container">
            <div class="card card-border-color card-border-color-primary">
              <div class="card-header"><img class="logo-img" src="assets/img/logo-xx.png" alt="logo" width="{conf.logoWidth}" height="27"><span class="splash-description">Please enter your user information.</span></div>
              <div class="card-body">
            
              <?php if(isset($success)) {?>
							<!--This code for injecting an alert-->
									<script>
												setTimeout(function () 
												{ 
													swal("Success!","<?php echo $success;?>!","success");
												},
													100);
									</script>
					
							<?php } ?>
							<?php if(isset($err)) {?>
							<!--This code for injecting an alert-->
									<script>
												setTimeout(function () 
												{ 
													swal("Failed!","<?php echo $err;?>!","Failed");
												},
													100);
									</script>
					
							<?php } ?>

              <!--Login Form-->
                <form method ="POST">
                  <div class="login-form">

                    <div class="form-group">
                      <input class="form-control" name="pass_fname" type="text" placeholder="Enter Your First Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_lname" type="text" placeholder="Enter Your Last Name" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_phone" type="text" placeholder="Enter Your Phone Number" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_addr" type="text" placeholder="Enter Your Address" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_uname" type="text" placeholder="Enter Your Username" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_email" type="email" placeholder="Enter Your Email Address" autocomplete="off">
                    </div>
                    <div class="form-group">
                      <input class="form-control" name="pass_pwd" type="password" placeholder="Password">
                    </div>
                    <div class="form-group row login-submit">
                      <div class="col-6"><a class="btn btn-secondary btn-xl" href="pass-login.php">Login</a></div>
                      <div class="col-6"><input type = "submit" name ="pass_register" class="btn btn-primary btn-xl" value ="Register"></div>
                    </div>

                  </div>
                </form>
                <!--End Login-->
              </div>
            </div>
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