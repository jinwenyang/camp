<?php
    session_start();
    session_destroy();
    mysqli_close($link);
    header('Location: index.php');
    exit();
?>