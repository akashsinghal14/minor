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
                          All Employee who wants to resign!
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
$req1 = mysql_query("select * from resign_app");
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
$dn2 = mysql_fetch_array($req2);
$date1 = date("d - M - Y");
$date_new1 = $date1;
$date_old1 = $dn1['date'];
$timestamp1 = strtotime($date_new1);
$timestamp2 = strtotime($date_old1);
//if($timestamp1 == $timestamp2){
  //  echo "$date_new1 is equal to the $date_old1 ";
//}else{
  //  echo ($timestamp1>$timestamp2)? "$date_new1 is greater than the $date_old1 ": "$date_old is greater than the $date_new1 ";
//}
?>
	<tr>
		<td><?php echo $i;?></td>
    	<td class="left"><?php $i++; echo htmlentities($dn1['emp_name'], ENT_QUOTES, 'UTF-8');  if($timestamp1 == $timestamp2) echo " (TODAY)"; else echo " (OLD)" ?></td>
    	
    	<td><?php echo $dn2['email']; ?></td>
    	<td><?php echo $dn1['hod_per']; ?></td>
	<td><?php echo $dn1['date']; ?></td>
	<td><a href="send_req_hod.php?name=<?php echo $dn1['emp_name']; ?>"><?php if($dn1['send_req_hod']=='NA')
	 echo "Take Permission From HOD";?></a></td>
    </tr>
<?php
}

?>
	
<?php
}
?>
</table><br/>

</tbody>
                            </div>
                            
                            </div>








<div class="panel-heading">
                           Permission Given By HOD to-!
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
$req1 = mysql_query("select * from resign_app where hod_per='y' ");
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
$req2 = mysql_query("select * from users where username = '$emp'");
$dn2 = mysql_fetch_array($req2);
$date1 = date("d - M - Y");
$date_new1 = $date1;
$date_old1 = $dn1['date'];
$timestamp1 = strtotime($date_new1);
$timestamp2 = strtotime($date_old1);
//if($timestamp1 == $timestamp2){
  //  echo "$date_new1 is equal to the $date_old1 ";
//}else{
  //  echo ($timestamp1>$timestamp2)? "$date_new1 is greater than the $date_old1 ": "$date_old is greater than the $date_new1 ";
//}
?>
	<tr>
		<td><?php echo $i;?></td>
    	<td class="left"><?php $i++; echo htmlentities($dn1['emp_name'], ENT_QUOTES, 'UTF-8');  if($timestamp1 == $timestamp2) echo " (TODAY)"; else echo " (OLD)" ?></td>
    	
    	<td><?php echo $dn2['email']; ?></td>
    	<td><?php echo $dn1['hod_per']; ?></td>
	<td><?php echo $dn1['date']; ?></td>
	<td><a href="send_req_all_shops.php?name=<?php echo $dn1['emp_name']; ?>"><?php if($dn1['send_req_all_shops']=='NA')
	 echo "Send Request to every shop to calculate dues";?></a></td>
    </tr>
<?php
}

?>
	
<?php
}
?>
</table>
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
		<a href= "http://www.esep.testweb.in/bower_components/morrisjs/examples/bar_charts.php"/><button type="button" class="btn btn-info">Analysis</button> 
		<a href="admin_total_dues.php"/><button type="button" class="btn btn-info">Total Dues</button>	


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