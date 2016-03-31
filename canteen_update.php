<?php
//ob_start();
session_start();

$dbname="webtestw_test";
$dbpass="@#%&chu";
$tname="shop_dues";

################### DB Connect ###############################
if ( $con=mysql_connect("127.0.0.1" , "webtestw_akash"  , $dbpass)  )
{
//print "DB connected"  . "<br />";
}
else
{
//print "DB not connected : "  .  mysql_error() .  "<br />";
die();
}
################################################################


################### DB Create ###############################

$dbquery="CREATE DATABASE $dbname;";

if ( mysql_query($dbquery) )
{
//print "DB created" . "<br />";
}
else
{
//print "DB not Created : " . mysql_error()  . "<br />";
}
################################################################


################### DB Use ###############################
if ( mysql_select_db("$dbname") )
{
//print "DB Used" . "<br />";
}
else
{
//print "DB not Used : " . mysql_error()  . "<br />";
}
################################################################


$emp_id=$_POST['emp_id'];
$shop_id=$_POST['shop_id'];
$name_stuff=$_POST['name_stuff'];
$price=$_POST['price'];
$paid=$_POST['paid'];
$dues=$_POST['dues'];
$date = date("d - M - Y");


$dn = mysql_query('select id,username from users where username="'.$_SESSION['username'].'"');


if(mysql_num_rows($dn)>0){
		$dnn = mysql_fetch_array($dn);
		//echo "<strong>" . $dnn['username'] . "</strong>";
		$user = $dnn['username'];
		$id = $dnn['id'];
		//echo $user;
		//echo $id;		
//header("location: login_page.php?error=you can login now.");
}

$y1 = mysql_query("select shop_canteen_status from resign_app where emp_id = $emp_id ");
if(mysql_num_rows($y1)>0){
$yy = mysql_fetch_array($y1);

$yyy = $yy['shop_canteen_status'];
}

if($yyy == 'y'){
echo "<script type='text/javascript'> document.location = 'canteen_portal.php?error=This Employee has already been resigned!!!'; </script>";
}

else{
$tquery="insert into $tname (emp_id, shop_id, name_stuff, price, paid , dues, date) values($emp_id, $shop_id, '$name_stuff', $price, $paid, $dues, '$date' );";
mysql_query($tquery);

}

if ( mysql_close() )
{
//print "DB Closed" . "<br />";
echo "<script type='text/javascript'> document.location = 'canteen_portal.php?error=your databases is updated.'; </script>";
}
else
{
//print "DB not Closed : " . mysql_error()  . "<br />";
}