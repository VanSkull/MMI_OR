<?php
    include("bdd.php");
    session_start();
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo']) &&
        isset($_POST['prenom']) && !empty($_POST['prenom']) &&
        isset($_POST['nom']) && !empty($_POST['nom']) &&
        isset($_POST['pwd']) && !empty($_POST['pwd'])){
            $sql = "SELECT * FROM user WHERE pseudo LIKE ? AND pwd LIKE PASSWORD(?) AND Prenom LIKE ? Nom LIKE ?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_POST['pseudo'],$_POST['pwd'],$_POST['prenom'],$_POST['nom']));
            if($line=$q->fetch()) {
                $_SESSION['id'] = $line['id'];
                $_SESSION['nom'] = $line['pseudo'];
                header("Location: ../index.php");
            }
    }
    else{
        header("Location: ../connexion.php?error='value'");
    }
?>