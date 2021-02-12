<?php
    include("bdd.php");
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
       if(isset($_POST['nom']) && !empty($_POST['nom'])){
            if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
                if(isset($_POST['pwd']) && !empty($_POST['pwd'])){
                    if(isset($_POST['repwd']) && !empty($_POST['repwd'])){
                        if(isset($_POST['class']) && !empty($_POST['class'])){
                            if($_POST['pwd'] == $_POST['repwd']){
                            $nom = str_replace("é","e",$_POST['nom']);
                            $nom = str_replace("è","e",$nom);
                            $nom = ucfirst($nom);
                            $prenom = str_replace("è","e",$_POST['prenom']);
                            $prenom = str_replace("é","e",$_POST['prenom']);
                            $prenom = strtoupper($prenom);
                                $sql = "SELECT * FROM etudiant WHERE Nom LIKE ? AND Prenom LIKE ? AND classe LIKE ?";
                                $q = $pdo->prepare($sql);
                                $q->execute(array($nom,$prenom,$_POST['class']));
                                if($line=$q->fetch()) {
                                    if($line['inscrit'] == 0){
                                        $id = $line['id'];
                                        $sql = "INSERT INTO user(pseudo,Prenom,Nom,pwd) VALUES (?,?,? PASSWORD(?))";
                                        $q = $pdo->prepare($sql);
                                        $q->execute(array($_POST['pseudo'],$nom,$prenom,$_POST['pwd']));
                                        $sql = "UPDATE etudiant SET inscrit = 1 WHERE id=?";
                                        $q = $pdo->prepare($sql);
                                        $q->execute(array($id));
                                        header('Location: ../index.php');
                                    }
                                    else{
                                        header('Location: ../connexion.php?error=already');
                                    }
                                }
                                else{
                                    header('Location: ../connexion.php?error=sql');
                                }
                            }
                            else{
                                header('Location: ../connexion.php?error=testmdp');
                            }
                        }
                        else{
                            header('Location: ../connexion.php?error=classe');
                        }
                    }
                    else{
                        header('Location: ../connexion.php?error=repasswd');
                    }
                }
                else{
                    header('Location: ../connexion.php?error=passwd');
                }
            }
            else{
                header('Location: ../connexion.php?error=nom');
            }
        }
        else{
            header('Location: ../connexion.php?error=prenom');
        }
    }
    else{
        header('Location: ../connexion.php?error=pseudo');
    }


?>