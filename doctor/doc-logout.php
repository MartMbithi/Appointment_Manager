<?php
    session_start();
    unset($_SESSION['c_id']);
    session_destroy();

    header("Location: doc-login.php");
    exit;
?>
