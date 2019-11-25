<?php
  session_start();
  include('assets/inc/config.php');
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
    <!--Nabigation Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation-->
      <!---Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="row">
          <!--Dashboard BreadCumbs-->
            <div class="col-12 col-lg-6 col-xl-3">
              <a href = "client-profile.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><i class="material-icons">account_circle</i></div>
                    <div class="data-info">
                      <div class="desc">My Profile</div>
                    </div>
                  </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
            <a href = "client-make-appointments.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><account_circlei class="material-icons">account_balance_wallet</i></div>
                    <div class="data-info">
                      <div class="desc">Make Appointment</div>
                    </div>
                  </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
            <a href = "client-manage-appointments.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><i class="material-icons">art_track</i></div>
                    <div class="data-info">
                      <div class="desc">My Appointments</div>
                    </div>
                  </div>
              </a>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
            <a href = "client-manage-appointments.php">
                  <div class="widget widget-tile">
                    <div class="chart sparkline"><i class="material-icons">assignment_ind</i></div>
                    <div class="data-info">
                      <div class="desc">Manage Appointments</div>
                    </div>
                  </div>
              </a>
            </div>
          </div>
          <!--End Dasboard Breadcrumps-->

          <div class="row">
            <div class="col-sm-6">
              <div class="card card-table">
                <div class="card-header">Doctors

                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>

                  </div>
                </div>
                <div class="card-body">
                <!--Start Table-->
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Doctor Name</th>
                        <th>Doctor Department</th>
                        <th>Doctor Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM ams_doc"; //sql code to get to ten trains randomly
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?> </td>
                            <td><?php echo $row->doc_dept;?></td>
                            <td><span class="badge badge-success"><?php echo $row->doc_status;?></span></td>
                            
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  <!--eND Table-->
                </div>
              </div>
            </div>
            <!--Our Specialties-->
            <div class="col-sm-6">
              <div class="card card-table">
                <div class="card-header">Our Specialties

                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>

                  </div>
                </div>
                <div class="card-body">
                <!--Start Table-->
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Specialty Name</th>
                        <th>Speciality Status</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM ams_speciality"; //sql code to get to ten trains randomly
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->s_name;?></td>
                             <td> <span class="badge badge-success">Availabe</span></td>                            
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  <!--eND Table-->
                </div>
              </div>
            </div>
          </div>
        </div>
          
        </div>
        <!--Footer-->
        <?php include('assets/inc/footer.php');?>
        <!--End Footer-->
      </div>
      
    </div>
    <script src="assets/lib/jquery/jquery.min.js" type="text/javascript"></script>
    <script src="assets/lib/perfect-scrollbar/js/perfect-scrollbar.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap/dist/js/bootstrap.bundle.min.js" type="text/javascript"></script>
    <script src="assets/js/app.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.pie.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.time.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/jquery.flot.resize.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.orderBars.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/curvedLines.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-flot/plugins/jquery.flot.tooltip.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <script src="assets/lib/countup/countUp.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/jquery.vmap.min.js" type="text/javascript"></script>
    <script src="assets/lib/jqvmap/maps/jquery.vmap.world.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.dashboard();
      
      });
    </script>
  </body>

</html>