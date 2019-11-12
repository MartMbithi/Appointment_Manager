<?php
    session_start();
    unset($_SESSION['s_id']);
    session_destroy();

    header("Location: sec-login.php");
    exit;
?>
