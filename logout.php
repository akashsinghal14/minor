<?php

session_start();

//session_destroy();
unset($_SESSION['usrnme']);
header ("location: login_page.php");

?>