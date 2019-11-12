<?php
    session_start();
    include('assets/inc/config.php');
    //date_default_timezone_set('Africa /Nairobi');
    include('assets/inc/checklogin.php');
    check_login();
    $aid=$_SESSION['a_id'];
    if(isset($_POST['add_doc']))
    {

            $doc_fname=$_POST['doc_fname'];
            //$doc_mname=$_POST['doc_mname'];
            $doc_lname = $_POST['doc_lname'];
            $doc_phone=$_POST['doc_phone'];
            $doc_addr=$_POST['doc_addr'];
            $doc_dept=$_POST['doc_dept'];
            $doc_status=$_POST['doc_status'];
            $doc_email=$_POST['doc_email'];
            $doc_pwd=$_POST['doc_pwd'];
            //$pass_ocupation=$_POST['pass_occupation'];
            //$pass_bio=($_POST['pass_bio']);
            //$passwordconf=md5($_POST['passwordconf']);
            //$date = date('d-m-Y h:i:s', time());
            $query="insert into ams_doc ( doc_fname, doc_lname, doc_phone, doc_dept, doc_status, doc_addr, doc_email, doc_pwd) values(?,?,?,?,?,?,?,?)";
            $stmt = $mysqli->prepare($query);
            $rc=$stmt->bind_param('ssssssss', $doc_fname,  $doc_lname, $doc_phone, $doc_dept, $doc_status, $doc_addr, $doc_email, $doc_pwd);
            $stmt->execute();
                if($stmt)
                {
                    $succ = "Doctor Added";
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
          <h2 class="page-head-title">Add Doctor</h2>
          <nav aria-label="breadcrumb" role="navigation">
            <ol class="breadcrumb page-head-nav">
              <li class="breadcrumb-item"><a href="doc-dashboard.php">Dashboard</a></li>
              <li class="breadcrumb-item"><a href="#">Doctor</a></li>
              <li class="breadcrumb-item active">Add</li>
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
        
          <div class="row">
            <div class="col-md-12">
              <div class="card card-border-color card-border-color-primary">
                <div class="card-header card-header-divider">Add Doctor<span class="card-subtitle">Fill All Details</span></div>
                <div class="card-body">
                  <form method ="POST">
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> First Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_fname"  id="inputText3" type="text">
                      </div>
                    </div>
                    
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3"> Last Name</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_lname"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Phone Number</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_phone"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_addr"  id="inputText3" type="text">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Doctor Department</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <select class="form-control" name="doc_dept">
                        <?php
                        /*
                        *Lets get details of Departmenrs!!
                        */
                        $ret="SELECT * FROM ams_speciality "; //sql code to get alldetails 
                        $stmt= $mysqli->prepare($ret) ;
                        $stmt->execute() ;//ok
                        $res=$stmt->get_result();
                        $cnt=1;
                        while($row=$res->fetch_object())
                        {?>
                          <option name="doc_dept" value="<?php echo $row->s_name;?>" selected> <?php echo $row->s_name;?> </option> 
                          <?php }?> 

                        </select>
                      </div>
                    </div>   

                    <div class="form-group row pt-1">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right">Doctor Status</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <select name ="doc_status" class="form-control">
                          <option value="Available" selected>Available</option>
                          <option value="Commited">Commited</option>
                        </select>
                      </div>
                    </div> 

                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Email Address</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_email"  id="inputText3" type="text">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label class="col-12 col-sm-3 col-form-label text-sm-right" for="inputText3">Password</label>
                      <div class="col-12 col-sm-8 col-lg-6">
                        <input class="form-control" name="doc_pwd"  id="inputText3" type="password">
                      </div>
                    </div>

                    <div class="col-sm-6">
                        <p class="text-right">
                          <input class="btn btn-space btn-primary" value ="Add Doctor" name = "add_doc" type="submit">
                          <button class="btn btn-space btn-secondary">Cancel</button>
                        </p>
                      </div>
                    </div>
                  </form>
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