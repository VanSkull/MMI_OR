<?php
    session_start();
    include("bdd.php");
    session_destroy();
    header("Location: ../index.php");
?>