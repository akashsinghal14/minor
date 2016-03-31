<?php 
session_start();
require('dbc.php');
require('config.php');
date_default_timezone_set('UTC');
//require('fpdf/fpdf.php');



//We check if the users ID is defined


	




?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Portal</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <?php include("header1.php"); ?>
		
<div id="page-wrapper">
</br></br>
<!-- /.row -->
<div class="row">
                
				 <div class="col-lg-10">
                    <div class="panel panel-info">
                        <div class="panel-heading">
                            Employee who wants to resign!
                        </div>
                        
                        <div class="panel-body">
                          <div class="table-responsive">
							
							<?php
							$i=1;
//We check if the user is logged
if(isset($_SESSION['username']))
{
//We list his messages in a table
//Two queries are executes, one for the unread messages and another for read messages
$userna=$_SESSION['username'];
$req1 = mysql_query("select * from resign_app where hod_per='NA' and send_req_hod='y'  ");
$req2 = mysql_query("select * from users");
?>
                                <table class="table">
                                    <thead>
                                        <tr>
											<th>#</th>
                                            <th>Username</th>
											
											<th>Email</th>
											<th>HODpermission</th>
											<th>Date of creation</th>
											<th>Action</th>
                                        </tr>
                                    <?php
//We display the list of read messages
while($dn1 = mysql_fetch_array($req1))
{
$emp=$dn1['emp_name'];
$req2 = mysql_query("select * from users where username = '$emp' ");
$dn2 = mysql_fetch_array($req2)
?>
	<tr>
		<td><?php echo $i;?></td>
    	<td class="left"><?php $i++; echo htmlentities($dn1['emp_name'], ENT_QUOTES, 'UTF-8'); ?></td>
    	
    	<td><?php echo $dn2['email']; ?></td>
    	<td><?php echo $dn1['hod_per']; ?></td>
	<td><?php echo $dn1['date']; ?></td>
	<td><?php if($dn1['hod_per']=='NA' && $dn1['send_req_hod']=='y')
	 echo "<button class='btn btn-primary btn-lg' data-toggle='modal' data-target='#myModal'>Give permission to resign</button>";?> </td>
	 
    </tr>
    
<?php
}
//If there is no read message we notice it
if(intval(mysql_num_rows($req2))==0)
{
?>
	<tr>
    	<td colspan="4" class="center">You have no sent message.</td>
    </tr>
<?php
}
?>
</table>
<?php
}
else
{
	echo 'You must be logged to access this page.';
}
?>
									</tbody>
                            </div>
                       
                        <?php if(isset($_GET['error']))
							{
							  echo '<div class="alert alert-error">';
							  echo '<a href="#" class="close" data-dismiss="alert">&times;</a>';
							  echo '<strong>Attention!&emsp;</strong>';
							  echo ''.$_GET['error'].'';
							  echo "</br>";
							  echo '</div>';
							
							} 
							
							?>
                    </div>
                    
                </div>
				</div>
           
		</div>
		



            <!-- /.row -->
           
            <!-- /.row -->
            
            <!-- /.row -->
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
    
	
		
		</div>
		</div>
</body>
</html>	



<div class="panel-body">
                            <!-- Button trigger modal -->
                            
                            <!-- Modal -->
                            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                                            
                                        </div>
                                        
                                        <?php
                                        $req1 = mysql_query("select * from resign_app where hod_per='NA' and send_req_hod='y'  ");
                                        while($dn1 = mysql_fetch_array($req1))
{
$emp=$dn1['emp_name'];
$req2 = mysql_query("select * from users where username = '$emp' ");
$dn2 = mysql_fetch_array($req2)
?>
					<div class="modal-body">
					<?php echo $dn1['emp_name']; ?>
					</div>
                                        <div class="modal-footer">
                                            <a href="hod_permission_y.php?name=<?php echo $dn1['emp_name']; ?>"><button type="button" class="btn btn-primary">yes</button></a>
                                           <a href="hod_permission_n.php?name=<?php echo $dn1['emp_name']; ?>"> <button type="button" class="btn btn-primary">no</button></a>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <!-- /.modal-content -->
                                </div>
                                <!-- /.modal-dialog -->
                            </div>
                            <!-- /.modal -->
                        </div>