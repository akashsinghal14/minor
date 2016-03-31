<?php
include('dbc.php');
include('config.php');
session_start();

if(isset($_GET['name']))
							
$username=$_GET['name'];
							  

mysql_query("UPDATE resign_app SET send_req_hod='y' WHERE emp_name='$username' ");
echo "<script type='text/javascript'> document.location = 'admin_portal.php?error=the request has been sent to HOD!'; </script>";


?>
