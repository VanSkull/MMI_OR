<?php

    session_start();
    include('bdd.php');
    if(isset($_SESSION['id'])){
        $sql = "SELECT * FROM user WHERE id=?";
        $q = $pdo->prepare($sql);
        $q->execute(array($_SESSION['id']));
        $id = $_SESSION['id'];
        while($line=$q->fetch()) {
            if($line['vote1'] == 0){
                $sql = "UPDATE user SET vote1 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else if($line['vote2'] == 0){
                $sql = "UPDATE user SET vote2 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else if($line['vote3'] == 0){
                $sql = "UPDATE user SET vote3 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else if($line['vote4'] == 0){
                $sql = "UPDATE user SET vote4 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else if($line['vote5'] == 0){
                $sql = "UPDATE user SET vote5 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else if($line['vote6'] == 0){
                $sql = "UPDATE user SET vote6 = ? WHERE id=?";
                $q = $pdo->prepare($sql);
                $q->execute(array($_GET['id'],$id));
                header("Location: ../index.php?vote=ok&id=".$_GET['id']);
            }
            else{
                header("Location: ../index.php?error=full");
            }
        }
    }
    else{
        header("Location: ../index.php?error=notlog");
    }

?>