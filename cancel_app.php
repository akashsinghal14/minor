<?php
//ob_start();
session_start();

$dbname="webtestw_test";
$dbpass="@#%&chu";
$tname="resign_app";

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

$dn = mysql_query('select id,username from users where username="'.$_SESSION['username'].'"');


if(mysql_num_rows($dn)>0){
		$dnn = mysql_fetch_array($dn);
		//echo "<strong>" . $dnn['username'] . "</strong>";
		$user = $dnn['username'];
		$id = $dnn['id'];
		//echo $user;
		//echo $id;
		
		
$tdelete="DELETE FROM $tname WHERE emp_id=$id;";
mysql_query($tdelete);
//header("location: login_page.php?error=you can login now.");
}

if ( mysql_close() )
{
//print "DB Closed" . "<br />";
echo "<script type='text/javascript'> document.location = 'create_result.php?error=your application has been canceled.'; </script>";
}
else
{
//print "DB not Closed : " . mysql_error()  . "<br />";
}