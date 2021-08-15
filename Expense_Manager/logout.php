<?php
    session_start();
    if(!isset($_SESSION)){
        header('location:index.html');
    }
    else{
        session_unset();
        session_destroy();
        session_abort();
        session_reset();
        header('location:index.php');
    }
?>

