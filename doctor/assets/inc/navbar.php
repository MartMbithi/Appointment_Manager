<?php
   /**
    *Server side code to get details of single passenger using id 
    */
    $aid=$_SESSION['doc_id'];
    $ret="select * from ams_doc where doc_id=?";//fetch details of pasenger
    $stmt= $mysqli->prepare($ret) ;
    $stmt->bind_param('i',$aid);
    $stmt->execute() ;//ok
    $res=$stmt->get_result();
    //$cnt=1;
    while($row=$res->fetch_object())
    {
?>
    <nav class="navbar navbar-expand fixed-top be-top-header">
        <div class="container-fluid">
          <div class="be-navbar-header"><a class="navbar-brand" href="doc-dashboard.php"></a>
          </div>
          <div class="page-title"><span>Hey Doctor <?php echo $row->doc_fname;?> This is Your Dashboard!</span></div>
          <div class="be-right-navbar">
            <ul class="nav navbar-nav float-right be-user-nav">
              <li class="nav-item dropdown"><a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" role="button" aria-expanded="false"><img src="assets/img/<?php echo $row->doc_dpic;?>" alt="Avatar"><span class="user-name"></span></a>
                <div class="dropdown-menu" role="menu">     
                  <div class="user-info">
                    <div class="user-name"><?php echo $row->doc_fname;?> <?php echo $row->doc_lname;?></div>
                    <div class="user-position online">Online</div>
                  </div><a class="dropdown-item" href="doc-profile.php"><span class="icon mdi mdi-face"></span>Account</a><a class="dropdown-item" href="doc-logout.php"><span class="icon mdi mdi-power"></span>Logout</a>
                </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
<?php }?>