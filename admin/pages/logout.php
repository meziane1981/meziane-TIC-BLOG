 <?php
session_start();
session_destroy();
header('location:../');
exit;



    // unset($_SESSION['admin']);
    // header("Location:../"); -->