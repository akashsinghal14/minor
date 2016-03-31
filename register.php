<?php
//ob_start();
session_start();

$dbname="webtestw_test";
$dbpass="@#%&chu";
$tname="users";

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




################### Table Name ###############################

################################################################

$username=$_POST['username'];
$email=$_POST['email'];
$password=$_POST['password'];
//print $username;

$date = date("d - M - Y");

$tinsert="INSERT INTO $tname (username,password,email,signup_date) VALUES  ('$username', '$password','$email','$date');";
if(mysql_query($tinsert))
{
header("location: login_page.php?error=you can login now.");
}
else
{
header("location: register_page.php?error=username or email has been taken.");
}

################################################################


###########################  DB Close ##########################
if ( mysql_close() )
{
//print "DB Closed" . "<br />";
//header("location: login_page.php?error=You are registered, you may login now.");
}
else
{
//print "DB not Closed : " . mysql_error()  . "<br />";
}
################################################################



//ob_end_flush();



?>