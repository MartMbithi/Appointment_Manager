<?php
    session_start();
    include('assets/inc/config.php');
    //date_default_timezone_set('Africa /Nairobi');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['a_id'];
    if(isset($_POST['update_sec']))
    {
            $s_id = $_GET['s_id'];
            $s_fname=$_POST['s_fname'];
            //$doc_mname=$_POST['doc_mname'];
            $s_lname = $_POST['s_lname'];
            $s_phone=$_POST['s_phone'];
            $s_addr=$_POST['s_addr'];
            //$doc_dept=$_POST['doc_dept'];
            //$doc_status=$_POST['doc_status'];
            $s_email=$_POST['s_email'];
            $s_pwd=$_POST['s_pwd'];
            //$pass_ocupation=$_POST['pass_occupation'];
            //$pass_bio=($_POST['pass_bio']);
            //$passwordconf=md5($_POST['passwordconf']);
            //$date = date('d-m-Y h:i:s', time());
            $query="update ams_secretary set s_fname=?, s_lname=?, s_phone=?, s_addr=?, s_email=?, s_pwd=?  where s_id=? ";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssi', $s_fname,  $s_lname, $s_phone, $s_addr, $s_email, $s_pwd, $s_id);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Secretary Updated";
                }
                else 
                {
                    $err = "Please Try Again Later";
                }
            #echo"<script>alert('Your Profile Has Been Updated Successfully');</script>";
            }
?>
<!DOCTYPE html>
<html lang="en">
<!--Head-->
<?php include('assets/inc/head.php');?>
<!--End Head-->
  <body>
    <div class="be-wrapper be-fixed-sidebar ">
    <!--Navigation Bar-->
      <?php include('assets/inc/navbar.php');?>
      <!--End Navigation Bar-->

      <!--Sidebar-->
      <?php include('assets/inc/sidebar.php');?>
      <!--End Sidebar-->
      <div class="be-content">
        <div class="page-head">
          <h2 class="page-head-title">Manage Secretary</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="doc-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Secretary</a></li>
              <li class="breadcrumb-item active">Manage</li>
            </ol>
          </nav>
        </div>
            <?php if(isset($succ)) {?>
                                <!--This code for injecting an alert-->
                <script>
                            setTimeout(function () 
                            { 
                                swal("Success!","<?php echo $succ;?>!","success");
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
        <div class="main-content container-fluid">
        <?php
            $aid=$_GET['s_id'];
            $ret="select * from ams_secretary where s_id=?";
            $stmt= $mysqli->prepare($ret) ;
            $stmt->bind_param('i',$aid);
            $stmt->execute() ;//ok
            $res=$stmt->get_result();
            //$cnt=1;
            while($row=$res->fetch_object())
        {
        ?>
        
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">Secretary<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" value="<?php echo $row->s_fname;?>" name="s_fname"  id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" value ="<?php echo $row->s_lname;?>" name="s_lname"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="s_phone"  value ="<?php echo $row->s_phone;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="s_addr" value="<?php echo $row->s_addr;?>" id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="s_email" value="<?php echo $row->s_email;?>"  id="inputText3" type="text">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Password</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="s_pwd"  id="inputText3" type="password">
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-primary" value ="Update Secretary" name = "update_sec" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
       
        <?php }?>
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
    <script src="assets/lib/jquery-ui/jquery-ui.min.js" type="text/javascript"></script>
    <script src="assets/lib/jquery.nestable/jquery.nestable.js" type="text/javascript"></script>
    <script src="assets/lib/moment.js/min/moment.min.js" type="text/javascript"></script>
    <script src="assets/lib/datetimepicker/js/bootstrap-datetimepicker.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.min.js" type="text/javascript"></script>
    <script src="assets/lib/select2/js/select2.full.min.js" type="text/javascript"></script>
    <script src="assets/lib/bootstrap-slider/bootstrap-slider.min.js" type="text/javascript"></script>
    <script src="assets/lib/bs-custom-file-input/bs-custom-file-input.js" type="text/javascript"></script>
    <script type="text/javascript">
      $(document).ready(function(){
      	//-initialize the javascript
      	App.init();
      	App.formElements();
      });
    </script>
  </body>

</html>