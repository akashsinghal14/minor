<?php
//include('config.php');
session_start();
//We check if the user is logged
if($_SESSION['username']==canteen)
{
echo "<script type='text/javascript'> document.location = 'canteen_portal.php'; </script>";
}
else{
echo "<script type='text/javascript'> document.location = 'index.php?error=you are not allowed to access this page!'; </script>";
}




?>
