<?php
//include('config.php');
session_start();
//We check if the user is logged
if($_SESSION['username']==hod)
{
echo "<script type='text/javascript'> document.location = 'hod_portal.php'; </script>";
}
else{
echo "<script type='text/javascript'> document.location = 'index.php?error=you are not allowed to access this page!'; </script>";
}




?>
