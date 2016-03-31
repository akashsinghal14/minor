<?php
include('dbc.php');
include('config.php');
session_start();

if(isset($_GET['name']))
							
$username=$_GET['name'];
							  

mysql_query("UPDATE resign_app SET hod_per='n' WHERE emp_name='$username' ");
echo "<script type='text/javascript'> document.location = 'hod_portal.php?error=the request has been sent to admin!'; </script>";


?>
