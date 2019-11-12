<div class="be-left-sidebar">
        <div class="left-sidebar-wrapper"><a class="left-sidebar-toggle" href="#">Dashboard</a>
          <div class="left-sidebar-spacer">
            <div class="left-sidebar-scroll">
              <div class="left-sidebar-content">
                <ul class="sidebar-elements">
                  <li class="divider">Menu</li>
                  <li class="active"><a href="sec-dashboard.php"><i class="icon mdi mdi-home"></i><span>Dashboard</span></a>
                  </li>
                    <?php
                      $aid=$_SESSION['s_id'];//assaign session a varible 
                      $ret="select * from ams_secretary where s_id=?";
                      $stmt= $mysqli->prepare($ret) ;
                      $stmt->bind_param('i',$aid);
                      $stmt->execute() ;//ok
                      $res=$stmt->get_result();
                      //$cnt=1;
                      while($row=$res->fetch_object())
                      {
                    ?>
                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-face"></i><span><?php echo $row->s_fname;?>'s Profile</span></a>
                    <ul class="sub-menu">
                      <li><a href="sec-profile.php">View</a>
                      </li>
                      <li><a href="sec-profile-update.php">Update</a>
                      </li>
                      
                      <li><a href="sec-profile-avatar.php"><span class="badge badge-success float-right">New</span>Profile Avatar</a>
                      </li>
                      <li><a href="sec-profile-password.php"><span class="badge badge-danger float-right">New</span>Change Password</a>
                      </li>
                      
                    </ul>
                  </li>
                    <?php }?>
                  
                  <li class="active" class="parent"><a href="#"><i class="icon mdi mdi-briefcase-edit-outline"></i><span>Appointments</span></a>
                    <ul class="sub-menu">
                      <li><a href="sec-make-appointments.php">Make Appointment</a>
                      </li>
                      <li><a href="sec-manage-appointments.php">Manage Appointments</a>
                      </li>
                      
                    </ul>
                  </li>                                   
                  <li class="active"><a href="sec-logout.php "><i class="icon mdi mdi-exit-run"></i><span>Log Out</span></a>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>