<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ./index.html");
    }
    session_destroy();
    header("Location: ./records.php");
?>