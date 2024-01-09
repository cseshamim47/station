<?php 

    session_start();
    session_destroy();
    setcookie('flag', 'rabbi', time()-10, '/');
    header('location: home.php');
?>