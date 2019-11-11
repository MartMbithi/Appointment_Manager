<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="active"><a href="client-dashboard.php"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['c_id'];//assaign session a varible [PASSENGER ID]
                      $ret="select * from ams_client where c_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->c_fname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="client-profile.php">View</a>
                      </li>
                      <li><a href="client-profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="cient-profile-avatar.php"><span class="badge badge-success float-right">New</span>Profile Avatar</a>
                      </li>
                      <li><a href="cient-profile-password.php"><span class="badge badge-danger float-right">New</span>Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>
                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-doctor"></i><span>Doctors</span></a>
                  
                    <ul class="sub-menu">
                       <li><a href="client-view-doc.php">Available Doctors</a>
                    </li>
                      
                    </ul>
                
                  </li>
                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Appointments</span></a>
                    <ul class="sub-menu">
                      <li><a href="client-make-appointments.php">Make Appointment</a>
                      </li>
                      <li><a href="client-manage-appointments.php">Manage Appointments</a>
                      </li>
                      
                    </ul>
                  </li>

                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-android-messages"></i><span>Mail</span></a>
                    <ul class="sub-menu">
                      <li><a href="client-mail.php">Send Mail</a>
                      </li> 
                      <li><a href="client-inmail.php">InBox </a>
                      </li>                     
                    </ul>
                  </li>
                                   
                  <li class="active"><a href="client-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Log Out</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>