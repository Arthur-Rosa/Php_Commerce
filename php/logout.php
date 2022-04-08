<?php 
session_start();
// kill the session
session_destroy();

// redirect
header('Location: Login/Login.php');
exit();
 ?>