<!--Server side scripting  code to hold  user session-->
<?php
  session_start();
  include('assets/inc/config.php');
  include('assets/inc/checklogin.php');
  check_login();
  $aid=$_SESSION['c_id'];
?>
<!--End server side code-->
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
        <!--Navbar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Doctors</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="client-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Doctors</a></li>
              <li class="breadcrumb-item active">Available</li>
            </ol>
          </nav>
        </div>
        <div class="main-content container-fluid">
          <div class="row">
            <div class="col-lg-12">
              <div class="card card-table">
                <div class="card-header">Available Doctors 
                </div>
                <div class="card-body">
                  <table class="table">
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
                        /*
                        *Lets get details of available trains!!
                        */
                        $ret="SELECT * FROM ams_doc  "; //sql code to get all details of trains.
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {
                    ?>
                        <tr class="odd gradeX even gradeC odd gradeA ">
                            <td><?php echo $cnt;?></td>
                            <td><?php echo $row->doc_fname;?></td>
                            <td><?php echo $row->doc_dept;?></td>
                            <td><span class ="badge badge-pill badge-success"><?php echo $row->doc_status;?></span></td>                           
                            
                        </tr>
                    <?php $cnt = $cnt+1; }?>
                    </tbody>
                  </table>
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