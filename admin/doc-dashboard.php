<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['a_id'];
?>
<!DOCTYPE html>
<html lang="en">
  <!--Head-->
  <?php include("assets/inc/head.php");?>
  <!--End Head-->
  <body>

    <div class="be-wrapper be-fixed-sidebar">

    <!--Navbar-->
     <?php include("assets/inc/navbar.php");?>
      <!--End Nav Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
        <div class="main-content container-fluid">
        <div class="row">
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">accessible</i></div>
                <div class="data-info">
                <?php
                  //code for summing up number of passengers 
                  $result ="SELECT count(*) FROM ams_client";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($client);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">My Clients</div>
                  <div class="value"><span class="indicator indicator-equal mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $client;?>"><?php echo $client;?></span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">account_box</i></div>
                <div class="data-info">
                <?php
                  //code for summing up number of trains
                  $result ="SELECT count(*) FROM ams_client";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($app);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Appointments</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $app;?>"><?php echo $app;?></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
              <div class="widget widget-tile">
              <div class="chart sparkline"><i class="material-icons">announcement</i></div>
                <div class="data-info">
                <?php
                  //code for summing up number of trains tickets
                  $result ="SELECT count(*) FROM ams_doc";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($pending);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                  <div class="desc">Doctors</div>
                  <div class="value"><span class="indicator indicator-positive mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $pending;?>"><?php echo $pending;?></span>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-12 col-lg-6 col-xl-3">
            <div class="widget widget-tile">
            <div class="chart sparkline"><i class="material-icons">burst_mode</i></div>
              <div class="data-info">
              <?php
                  //code for summing up number of trains tickets
                  $result ="SELECT count(*) FROM ams_doc ";
                  $stmt = $mysqli->prepare($result);
                  $stmt->execute();
                  $stmt->bind_result($doc);
                  $stmt->fetch();
                  $stmt->close();
                ?>
                <div class="desc">Secretaries</div>
                <div class="value"><span class="indicator indicator-negative mdi mdi-chevron-right"></span><span class="number" data-toggle="counter" data-end="<?php echo $doc;?>"><?php echo $doc;?></span>
                </div>
              </div>
            </div>
            </div>
            
          </div>            
          <div class="row">
            <div class="col-sm-6">
              <div class="card card-table">
                <div class="card-header">My Clients
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                <!--Start Table-->
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Client Number</th>
                        <th>Client Phone</th>
                        <th>Client Email</th>
                        <th>Client Address</th>
                        <th>Client Gender</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php

                        $ret="SELECT * FROM ams_client ORDER BY RAND() LIMIT 1000 "; //sql code to get to ten trains randomly
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->c_fname;?> <?php echo $row->c_mname;?> <?php echo $row->c_lname;?> </td>
                            <td><?php echo $row->c_phoneno;?></td>
                            <td><?php echo $row->c_email;?></td>
                            <td><?php echo $row->c_addr;?></td>
                            <td><?php echo $row->c_sex;?></td>
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  <!--eND Table-->
                </div>
              </div>
            </div>
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
                        <th>Doc Name</th>
                        <th>Doc Address</th>
                        <th>Doc Phone No</th>
                        <th>Doc Department</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $ret="SELECT DISTINCT *  FROM ams_doc  "; //sql code to get all doc intel
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo  $cnt;?></td>
                            <td><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></td>
                            <td><?php echo $row->doc_addr;?></td>
                            <td><?php echo $row->doc_phone;?></td>
                            <td><?php echo $row->doc_dept;?></td>                          
                          </tr>

                      <?php $cnt=$cnt+1; }?>
                    </tbody>
                  </table>
                  <!--eND Table-->
                </div>
              </div>
            </div>
          </div>
          <div class="row">
          <div class="col-sm-12">
              <div class="card card-table">
                <div class="card-header">Secretaries
                
                  <div class="tools dropdown"><span class=""></span><a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown"><span class=""></span></a>
                    
                  </div>
                </div>
                <div class="card-body">
                <!--Start Table-->
                  <table class="table table-striped table-hover table-fw-widget" id="table1">
                    <thead>
                      <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Phone No</th>
                        <th>Email Address</th>
                        
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $ret="SELECT DISTINCT *  FROM ams_secretary  "; //sql code to get all doc intel
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                      {
                      ?>
                          <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo  $cnt;?></td>
                            <td><?php echo $row->s_fname;?> <?php echo $row->s_lname;?></td>
                            <td><?php echo $row->s_addr;?></td>
                            <td><?php echo $row->s_phone;?></td>
                            <td><?php echo $row->s_email;?></td>                          
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
        <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
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
    <script src="assets/lib/datatables/datatables.net/js/jquery.dataTables.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-bs4/js/dataTables.bootstrap4.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/dataTables.buttons.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.flash.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/jszip/jszip.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/pdfmake.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/pdfmake/vfs_fonts.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.colVis.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.print.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons/js/buttons.html5.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive/js/dataTables.responsive.min.js" type="text/javascript"></script>
    <script src="assets/lib/datatables/datatables.net-responsive-bs4/js/responsive.bootstrap4.min.js" type="text/javascript"></script>
    
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.dashboard();
      
      });
    </script>
  </body>

</html>