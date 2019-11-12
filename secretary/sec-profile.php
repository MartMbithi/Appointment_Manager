<?php
    session_start();
    include('assets/inc/config.php');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['s_id'];
?>

<!DOCTYPE html>
<html lang="en">
  <!--Head-->
  
  <?php include('assets/inc/head.php');?>
  <!--End Head-->
  <body>


    <div class="be-wrapper be-fixed-sidebar">
    <!--Navigation Bar-->
      <?php include("assets/inc/navbar.php");?>
      <!--End Naigation Bar-->
      <!--Sidebar-->
        <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->

        <!--Server Side Scrit To Fetch all details of logged in user-->
        <?php
            $aid=$_SESSION['s_id'];
            $ret="select * from ams_secretary where s_id=?"; 
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
        while($row=$res->fetch_object()) //Display all passenger details
        {
        ?>
        <!--End Server Side Script-->
      <div class="be-content">
        <div class="main-content container-fluid">
          <div class="user-profile">
            <div class="row">
              <div class="col-lg-12">
                <div class="user-display">
                  <div class="user-display-bg"><img src="assets/img/<?php echo $row->s_dpic;?>" alt="Profile Background"></div>
                  <div class="user-display-bottom">
                    <div class="user-display-avatar"><img src="assets/img/<?php echo $row->s_dpic;?>" alt="Avatar"></div>
                    <div class="user-display-info">
                      <div class="name"><?php echo $row->s_fname;?> <?php echo $row->s_lname;?> </div>
                    </div>
                    
                  </div>
                </div>
                <div class="user-info-list card">
                  <div class="card-header card-header-divider"><span class="card-subtitle"></span></div>
                  <div class="card-body">
                    <table class="no-border no-strip skills">
                      <tbody class="no-border-x no-border-y">
                        <tr>
                          <td class="icon"><span class="mdi mdi-cake"></span></td>
                          <td class="item">Email<span class="icon s7-gift"></span></td>
                          <td><?php echo $row->s_email;?></td>
                        </tr>
                        <tr>
                          <td class="icon"><span class="mdi mdi-smartphone-android"></span></td>
                          <td class="item">Mobile<span class="icon s7-phone"></span></td>
                          <td><?php echo $row->s_phone;?></td>
                        </tr>                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
          </div>
          <!--footer-->
        <?php include('assets/inc/footer.php');?>
        <!--EndFooter-->
        </div>
      </div>
    <?php }?>
     
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
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.pageProfile();
      });
    </script>
  </body>

</html>