<?php
    include("bdd.php");
    function Random($length = 10,$id) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $idlength = strlen($id);
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
            $randomString .= $id[rand(0,$idlength - 1)];
        }
        return $randomString;
    }
    function envoimail($nom,$prenom,$mail,$code){
        $to = $mail;
	    $subject = "Votre participation au concours";
	    $message = "Salut " . $prenom . ", \r\n
				Merci de ton inscription sur notre site, cette inscription te donne le droit de participer à notre concours.\r\n
				Pour participer il te suffit de garder précieusement ce code :" . $code . "\r\n
                Lors de notre soirée des codes seront tirés aléatoirement afin de sélectionner les gagnant, c'est lors de cette soirée que tu saura si tu as gagné ou non.\r\n
                Pour ceux dont leur code a été tiré, vous aurez 24h pour nous envoyer un signe de vie sinon votre lot sera attribué à quelqu'un d'autre ;)\r\n
                L'équipe des MMI D'OR.";
	    $from = "From: Les MMI D'OR<mmidor2021@gmail.com> \r\n";
	    mail($to,$subject,$message,$from);
    }
    if(isset($_POST['pseudo']) && !empty($_POST['pseudo'])){
       if(isset($_POST['prenom']) && !empty($_POST['prenom'])){
            if(isset($_POST['nom']) && !empty($_POST['nom'])){
                if(isset($_POST['mail']) && !empty($_POST['mail'])){
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
                                            $sql = "INSERT INTO user(pseudo,Nom,Prenom,mail,pwd) VALUES (?,?,?,?, PASSWORD(?))";
                                            $q = $pdo->prepare($sql);
                                            $q->execute(array($_POST['pseudo'],$nom,$prenom,$_POST['mail'],$_POST['pwd']));
                                            $sql = "UPDATE etudiant SET inscrit = 1 WHERE id=?";
                                            $q = $pdo->prepare($sql);
                                            $q->execute(array($id));
                                            $random = Random(5,$id);
                                            $sql = "UPDATE etudiant SET code = ? WHERE id=?";
                                            $q = $pdo->prepare($sql);
                                            $q->execute(array($random,$id));
                                            envoimail($nom,$prenom,$_POST['mail'],$random);
                                            header('Location: ../connexion.php?insc=ok');
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
                    header('Location: ../connexion.php?error=mail');
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