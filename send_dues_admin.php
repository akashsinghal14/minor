<?php
include('dbc.php');
include('config.php');
session_start();

if(isset($_GET['uname']))
							
$username=$_GET['uname'];
							  
$id1=mysql_query("select * from users where username='$username' ");


while($dn2 = mysql_fetch_array($id1))
{
	$idd=$dn2['id'];
	
	
	}
	//echo $idd;
	//echo "<br/>";
if($_SESSION['username']=='canteen'){
$dues=mysql_query("select dues from shop_dues WHERE emp_id=$idd  and shop_id = 1") ;
$due =0 ;
while($dn22 = mysql_fetch_array($dues)){

	$due = $dn22['dues'] + $due;

}
}


if($_SESSION['username']=='std'){
$dues=mysql_query("select dues from shop_dues WHERE emp_id=$idd  and shop_id = 2") ;
$due =0 ;
while($dn22 = mysql_fetch_array($dues)){

	$due = $dn22['dues'] + $due;

}
}
//echo $due;

mysql_query("UPDATE resign_app SET cantee_dues='$due' WHERE emp_name='$username' ");

mysql_query("UPDATE resign_app SET shop_canteen_status='y' WHERE emp_name='$username' ");
echo "<script type='text/javascript'> document.location = 'canteen_portal.php?error=the dues have been sent to employee '; </script>";




?>