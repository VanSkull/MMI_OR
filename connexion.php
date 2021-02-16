<?php
    include('exe/bdd.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>MMI d'OR 2021 - 8e édition</title>
        
        <!-- Métadonnées -->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="images/favicon.png" type="image/png" />        
        
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        
        <!-- Fonts Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        <!-- Feuilles de style -->
        <link href="css/normalize.css" rel="stylesheet" type="text/css" />
        <link href="css/style.css" rel="stylesheet" type="text/css" />
        
        <!-- Bibliothèques JavaScript -->
        <!--<script src="js/jquery-3.5.1.min.js"></script>-->
    </head>
    <body>
    <div id="main-contain">
            <!-- Contenu principal -->
            <div id="main-contenu">
                <div id="contenu-body">
                    <div id="all-sections">
                        <div id="section-home" class="current">
                            <div id="formulaire">
                             <form method="POST" action="exe/inscription.php">
                                <input type="text" name="pseudo" placeholder="Pseudo"><br/>
                                <input type="text" name="nom" placeholder="Nom"><br/>
                                <input type="text" name="prenom" placeholder="Prénom"><br/>
                                <input type="email" name="mail" placeholder="Adresse mail"><br/>
                                <select name="class">
                                    <option value="">Selectionner une classe</option>
                                    <option value="MMI1">MMI1</option>
                                    <option value="MMI2">MMI2</option>
                                    <option value="DU">DU</option>
                                </select><br/>
                                <input type="password" name="pwd" placeholder="Mot de passe"><br/>
                                <input type="password" name="repwd" placeholder="Mot de passe"><br/>
                                <input type="submit" value="S'inscrire">
                             </form>
                            <h2>Déjà inscrit ?</h2>
                             <input type="button" value="Se connecter" onclick="connect()">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/connexion.js"></script>
</html>