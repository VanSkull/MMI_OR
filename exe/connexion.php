<?php
    include("bdd.php");
    session_start();
    if(isset($_POST['mail']) && !empty($_POST['mail']) &&
        isset($_POST['pwd']) && !empty($_POST['pwd'])){
            $sql = "SELECT * FROM user WHERE mail LIKE ? AND pwd LIKE PASSWORD(?)";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['mail'],$_POST['pwd']));
            if($line=$q->fetch()) {
                $_SESSION['id'] = $line['id'];
                $_SESSION['nom'] = $line['pseudo'];
                header("Location: ../index.php");
            }
    }
    else{
        header("Location: ../connexion.php?error='incorrect'");
    }
?>