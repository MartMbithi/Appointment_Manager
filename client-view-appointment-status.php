
<?php
    session_start();
    include('assets/inc/config.php');
    //date_default_timezone_set('Africa /Nairobi');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['c_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
<?php include('assets/inc/head.php');?>
  <!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar">
    <!--Navbar-->
      <?php include("assets/inc/navbar.php");?>
      <!--End Navbar-->
      <!--Sidebar-->
      <?php include("assets/inc/sidebar.php");?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">View Appointment</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="cient-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Appointments</a></li>
              <li class="breadcrumb-item active">Manage Appointments</li>
            </ol>
          </nav>
        </div>
        <?php
              /**
               * We need to get firstname or username of logged in user!!
               */         
                $aid=$_SESSION['c_id'];
                $ret="select * from ams_client where c_id=?";
                $stmt= $mysqli->prepare($ret) ;
                $stmt->bind_param('i',$aid);
                $stmt->execute() ;//ok
                $res=$stmt->get_result();
                //$cnt=1;
                while($row=$res->fetch_object())
                 {
        ?>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="invoice">
                <div class="row invoice-header">
                  <div class="col-sm-7">
                    <div class="invoice-logo"></div>
                  </div>
                  <div class="col-sm-5 invoice-order"><span class="invoice-id">Appointment  #<?php echo $row->c_id;?></span><span class="incoice-date"><?php echo $row->c_preff_date;?></span></div>
                </div>
                <div class="row invoice-data">
                  <div class="col-sm-5 invoice-person"><span class="name"><?php echo $row->c_fname;?> <?php echo $row->c_lname;?></span><span><?php echo $row->c_email;?></span><span><?php echo $row->c_addr;?></span></div>
                  <div class="col-sm-2 invoice-payment-direction"></div>
                </div>
                <div class="row">
                  <div class="col-lg-12">
                    <table class="invoice-details">
                    <table class="table">
                      <thead class="thead-light">
                            <tr>
                            <th scope="col">Desc</th>
                            <th scope="col">Appointment Date</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Apointment Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">Booked An Appointment</th>
                            <td><?php echo $row->c_preff_date;?></td>
                            <td><?php echo $row->c_speciality;?></td>
                            <td><span class = "badge badge-success"><?php echo $row->c_appoint_stats;?></span></td>
                            </tr>
                        </tbody>
                    </table>
                  </div>
                </div>              
              </div>
            </div>
          </div>
        </div>
        <?php }?>
      </div>
      <!--Footer-->
      <?php include ('assets/inc/footer.php');?>
      <!--End Footer-->
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      });
      
    </script>
  </body>

</html>