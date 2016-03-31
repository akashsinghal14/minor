<?php
//ob_start();
session_start();
include('config.php');
?>

<?php

//We check if the user is logged
if(isset($_SESSION['username']))
{
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
?>
<!--This is the list of your messages:<br />
<a href="new_pm.php" class="link_new_pm">New PM</a><br />
<h3>Unread Messages(<?php echo intval(mysql_num_rows($req1)); ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date of creation</th>
    </tr>-->
<?php
//We display the list of unread messages
while($dn1 = mysql_fetch_array($req1))
{
?>
	<!--<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn1['reps']-1; ?></td>
    	<td><a href="profile.php?id=<?php echo $dn1['userid']; ?>"><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></td>
    </tr>-->
<?php
}
//If there is no unread message we notice it
if(intval(mysql_num_rows($req1))==0)
{
?>
	<!--<tr>
    	<td colspan="4" class="center">You have no unread message.</td>
    </tr>-->
<?php
}
?>
<!--</table>
<br />
<h3>Read Messages(<?php echo intval(mysql_num_rows($req2)); ?>):</h3>
<table>
	<tr>
    	<th class="title_cell">Title</th>
        <th>Nb. Replies</th>
        <th>Participant</th>
        <th>Date or creation</th>
    </tr>-->
<?php

//We display the list of read messages
while($dn2 = mysql_fetch_array($req2))
{
?>
	<!--<tr>
    	<td class="left"><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo $dn2['reps']-1; ?></td>
    	<td><a href="profile.php?id=<?php echo $dn2['userid']; ?>"><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></a></td>
    	<td><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></td>
    </tr>-->
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($req2))==0)
{
?>
<!--
	<tr>
    	<td colspan="4" class="center">You have no read message.</td>
    </tr>-->
<?php
}
?>
<!--</table>-->
<?php

}
else
{
	//echo 'You must be logged to access this page.';
	//echo "<meta http-equiv='refresh' content='0; url=http://www.esep.testweb.in/login_page.php' />";
	echo "<script type='text/javascript'> document.location = 'login_page.php'; </script>";
	//header('location: login_page.php');
	//echo 'You must be logged to access this page.';
		
}
?>


		<!--<div class="foot"><a href="<?php echo $url_home; ?>">Go Home</a> - <a href="http://www.webestools.com/">Webestools</a></div>-->

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">E-Separation Portal</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
					<?php  $i=intval(mysql_num_rows($req1)); 
						if ($i==0)
						{?>
							<i class="fa fa-envelope fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<?php } 
						else{
							?>
							<i class="fa fa-envelope fa-fw"></i><?php echo intval(mysql_num_rows($req1)); ?>  <i class="fa fa-caret-down"></i>
						<?php }?>
					
                        
                    </a>
                    <ul class="dropdown-menu dropdown-messages">
					
					                        <?php
$req1 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user1read="no" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="no" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
//We display the list of read messages
while($dn1 = mysql_fetch_array($req1))
{
?>
	
    	<li class="divider"></li>
                        <li>
						<a href="#">
                                <div>
    	<?php //echo $dn2['reps']-1; ?>
    	<strong><?php echo htmlentities($dn1['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
    	<span class="pull-right text-muted">
                  <em><?php echo date('Y/m/d H:i:s' ,$dn1['timestamp']); ?></em>
                                    </span>
		
     </div>
                                <div><a href="read_pm.php?id=<?php echo $dn1['id']; ?>"><?php echo htmlentities($dn1['title'], ENT_QUOTES, 'UTF-8'); ?></a><text style="color:red;">(New)</text></div>
                            </a>
                        </li>
<?php
}
?>
                        <?php
$req2 = mysql_query('select m1.id, m1.title, m1.timestamp, count(m2.id) as reps, users.id as userid, users.username from pm as m1, pm as m2,users where ((m1.user1="'.$_SESSION['userid'].'" and m1.user2="'.$_SESSION['userid'].'" and m1.user1read="yes" and users.id=m1.user2) or (m1.user2="'.$_SESSION['userid'].'" and m1.user2read="yes" and users.id=m1.user1)) and m1.id2="1" and m2.id=m1.id group by m1.id order by m1.id desc');
//We display the list of read messages
while($dn2 = mysql_fetch_array($req2))
{
?>
	
    	
                        <li>
						<a href="#">
                                <div>
    	<?php //echo $dn2['reps']-1; ?>
    	<strong><?php echo htmlentities($dn2['username'], ENT_QUOTES, 'UTF-8'); ?></strong>
    	<span class="pull-right text-muted">
                  <em><?php echo date('Y/m/d H:i:s' ,$dn2['timestamp']); ?></em>
                                    </span>
		
     </div>
                                <div><a href="read_pm.php?id=<?php echo $dn2['id']; ?>"><?php echo htmlentities($dn2['title'], ENT_QUOTES, 'UTF-8'); ?></a></div>
                            </a>
							<li class="divider"></li>
                        </li>
<?php
}
?>
                        
                        
                        
                        
                    </ul>
                    <!-- /.dropdown-messages -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-tasks fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    
					<ul class="dropdown-menu dropdown-messages">
                        <li>
                            <a href="new_msg.php">
                                <div>
                                    <i class="fa fa-comment fa-fw"></i> Create a New Message                                    
                                </div>
                            </a>
                        </li>
                       
                       
                        <li class="divider"></li>
                        <li>
                            <a href="rec_by.php">
                                <div>
                                    <i class="fa fa-envelope fa-fw"></i> View Messages
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="#">
                                <div>
                                    <i class="fa fa-tasks fa-fw"></i> New 
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="sent_msg.php">
                                <div>
                                    <i class="fa fa-upload fa-fw"></i> View Sent Messages
                                    
                                </div>
                            </a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a class="text-center" href="#">
                                <strong>See All Alerts</strong>
                                <i class="fa fa-angle-right"></i>
                            </a>
                        </li>
                    </ul>
                    <!-- /.dropdown-tasks -->
                </li>
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                    
							<?php
                    if($_SESSION['username']=='canteen'){
                    $req11 = mysql_query('select * from resign_app where send_req_all_shops="y" and shop_canteen_status="NA" ');
                    
                      $j=intval(mysql_num_rows($req11)); 
                      }
                      
                       if($_SESSION['username']=='std'){
                    $req11 = mysql_query('select * from resign_app where send_req_all_shops="y" and shop_std_status="NA" ');
                    
                      $j=intval(mysql_num_rows($req11)); 
                      }
                      
						if ($j==0)
						{?>
							<i class="fa fa-bell fa-fw"></i>  <i class="fa fa-caret-down"></i>
						<?php } 
						else{
							?>
							<i class="fa fa-bell fa-fw"></i><?php  echo $j; ?>  <i class="fa fa-caret-down"></i>
						<?php }?>
						
					
                        
                    </a>
				
				
					
                    <ul class="dropdown-menu dropdown-alerts">
                     <?php
                    if($_SESSION['username']=='canteen'){
                    $req11 = mysql_query('select * from resign_app where send_req_all_shops="y" and shop_canteen_status="NA" ');
                    
                      $j=intval(mysql_num_rows($req11)); 
                      }
                      
                       if($_SESSION['username']=='std'){
                    $req11 = mysql_query('select * from resign_app where send_req_all_shops="y" and shop_std_status="NA" ');
                    
                      $j=intval(mysql_num_rows($req11)); 
                      }
                      
                      if($_SESSION['username']=='canteen'){
                      while($dn11 = mysql_fetch_array($req11)){
                      ?>
                            <li>
                            <a href="send_dues_admin.php?uname=<?php echo htmlentities($dn11['emp_name'], ENT_QUOTES, 'UTF-8') ?>">
                                <div>
                            <?php
                               
                      			
                      			//echo "<i class="fa fa-comment fa-fw"></i> ";
                      			echo   htmlentities($dn11['emp_name'], ENT_QUOTES, 'UTF-8') .  " wants to resign";
                      			echo "<span class='pull-right text-muted small'>Admin</span>";
                                    
                              
                              
                                    ?>
                                </div>
                            </a>
                        </li>
                        <?php
                        }
                        }?>
						<li class="divider"></li>
                        
                        
                        
                        
                    </ul>
                    <!-- /.dropdown-alerts -->
                </li>
				<!-- /.dropdown -->
		
                <!-- /.dropdown -->
                <li class="dropdown">
                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
                    </a>
                    <ul class="dropdown-menu dropdown-user">
							<?php
											//session_start();
											if(isset($_SESSION['username']) == ""){
												header ("location: login_page.php");
												}
													else {
													print "<li><a><i class='fa fa-user fa-fw'></i> Welcome <strong>". $_SESSION['username'].'</strong></a></li>';
													//print "<li><a>welcome<strong> ". $_SESSION['usrnme'].'</strong></a></li>';
													print '<li><a><i class="fa fa-gear fa-fw"></i> My Account</a></li>';
													print "<li class='divider'></li>";
													print '<li><a href="login.php"><i class="fa fa-sign-out fa-fw"></i> Logout</a></li>';
														}
										?>
                       
                    </ul>
                    <!-- /.dropdown-user -->
                </li>
                <!-- /.dropdown -->
            </ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li class="sidebar-search">
                            <div class="input-group custom-search-form">
                                <input type="text" class="form-control" placeholder="Search...">
                                <span class="input-group-btn">
                                <button class="btn btn-default" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                            </div>
                            <!-- /input-group -->
                        </li>
                        <li>
                            <a href="index.php"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>
                        </li>
                        
                       
                        <li>
                            <a href="create_result.php"><i class="fa fa-edit fa-fw"></i>Generate Resignation-Letter</a>
                        </li>
                        
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw"></i> Multiple users<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li>
                                    <a href="canteen.php">Canteen</a>
                                </li>
                                <li>
                                    <a href="std_pco.php">STD_PCO</a>
                                </li>
                                <li>
                                    <a href="hod.php">HOD</a>
                                </li>
                                <li>
                                    <a href="admin.php">ADMIN <span class="fa arrow"></span></a>
                                    
                                    <!-- /.nav-third-level -->
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
                    </ul>
                    <?php if(isset($_GET['error']))
							{
							  echo '<div class="alert alert-error">';
							  echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
							  echo '<strong>Warning!&emsp;</strong>';
							  echo ''.$_GET['error'].'';
							  echo "</br>";
							  echo '</div>';
							} 
							
							?>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        