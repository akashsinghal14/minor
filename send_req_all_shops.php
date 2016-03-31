<?php
include('dbc.php');
include('config.php');
session_start();

if(isset($_GET['name']))
							
$username=$_GET['name'];
							  

mysql_query("UPDATE resign_app SET send_req_all_shops='y' WHERE emp_name='$username' ");
mysql_query("UPDATE users SET curr_working='n' WHERE username='$username' ");

echo "<script type='text/javascript'> document.location = 'admin_portal.php?error=the request has been sent to All shops and Departments!'; </script>";


?>