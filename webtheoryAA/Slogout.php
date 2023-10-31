<?php
    session_start();
    if(!isset($_SESSION['user_id'])){
        header("Location: ./index.html");
    }
    session_destroy();
    header("Location: http://localhost/Athentication/webtheoryAA/recordsS.php");
?>