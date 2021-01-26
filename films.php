<?php
    include('exe/bdd.php');
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
        <!-- Page principal -->
        <div id="main-contain">
            
            <!-- Menu principal -->
            <div id="main-menu">
                <!-- Logo -->
                <div id="menu-logo">
                    <a href="index.php"><img id="logo-site" src="images/favicon.png" alt="Logo_MMI_OR_2021" /><a>
                </div>
                
                <!-- Séparateur -->
                <div id="menu-marker">
                </div>
                
                <!-- Menu navigation -->
                <div id="menu-navigation">
                    <nav>
                        <li class="active" id="li-home"><a href="#" id="accueil">MMI D'OR</a></li>
                        <li id="li-films"><a href="#" id="films">FILMS</a></li>
                        <li id="li-planning"><a href="#" id="planning">PLANNING</a></li>
                        <li id="li-concours"><a href="#" id="concours">CONCOURS</a></li>
                        <li id="li-contact"><a href="#" id="contact">CONTACT</a></li>
                    </nav>
                </div>
                
                <!-- Réseaux sociaux -->
                <div id="menu-social-networks">
                    <p id="links-social-networks">
                        <a id="link-discord" href="https://discord.gg/JrAPBWcN3J"><img id="img-link-discord" src="images/discord.png" alt="Lien_Discord_MMI_OR_2021" /></a>
                        <a id="link-facebook" href="https://www.facebook.com/mmi.dor.2021.iut.lens"><img id="img-link-facebook" src="images/facebook.png" alt="Lien_Facebook_MMI_OR_2021" /></a>
                    </p>
                </div>
                
                <!-- Copyright -->
                <div id="menu-copyright">
                    <p id="copyright-text">©2021 MMI D'OR</p>
                </div>                
            </div>
            <div id="main-contenu">
                <?php
                    $sql = "SELECT * FROM films WHERE id=?";
                    $q = $pdo->prepare($sql);
                    $q->execute(array($_GET['id']));
                    while($line=$q->fetch()) {
                ?>
                <div id="films-infos">
                                <div id="court-metrage">
                                    <video controls>

                                        <source src="images/ba/<?php echo $line['ba'];?>"
                                                type="video/mp4">

                                        Sorry, your browser doesn't support embedded videos.
                                    </video>
                                </div>
                                <div id="film-presentation">
                                    <h1 id="titre-film" class="text-title-gold"><?php echo $line['title'];?></h1>
                                    <h2><span class='darker-name'>Durée : </span><span class='lighter-name'><?php echo str_replace(".",":",$line['duree']);?> min</span></h2>
                                    <?php 
                                }?>
                                    <h2>Équipe technique :</h2>
                                    <ul>
                                        <?php
                                            $sql = "SELECT * FROM roles INNER JOIN personne on idPersonne=personne.id WHERE idFilm=?";
                                            $q = $pdo->prepare($sql);
                                            $q->execute(array($_GET['id']));
                                            while($line=$q->fetch()) {
                                                echo "<li><span class='darker-name'>" . $line['intitule'] . "</span> : <span class='lighter-name'>" . $line['prenom'] . " " . $line['nom'] . "</span></li>";
                                            }
                                        ?>
                                    </ul>

                                    <h2>Les contacter :</h2>
                                    <nav id="film-reseaux">
                                        <?php
                                            $sql = "SELECT * FROM reseaux WHERE idFilm=?";
                                            $q = $pdo->prepare($sql);
                                            $q->execute(array($_GET['id']));
                                            while($line=$q->fetch()) {
                                                if($line['nom'] == "insta"){
                                                    echo "<a id='insta' href='" . $line['url'] . "'><img src='images/instagram.png' alt='logo Instagram'></a>";
                                                }
                                                if($line['nom'] == "fb"){
                                                    echo "<a id='fb' href='" . $line['url'] . "'><img src='images/facebook.png' alt='logo Facebook'></a>";
                                                }
                                                if($line['nom'] == "twitter"){
                                                    echo "<a id='twitter' href='" . $line['url'] . "'><img src='images/twitter.png' alt='logo Twitter'></a>";
                                                }
                                                if($line['nom'] == "gmail"){
                                                    echo "<a id='gmail' href='" . $line['url'] . "'><img src='images/gamil-logo-16.png' alt='logo Gmail'></a>";
                                                }
                                            }
                                        ?>
                                    </nav>
                                </div>
                </div>
            </div>
        </div>
        <!-- JavaScript & JQuery -->
        <!--<script src="js/main.js"></script>-->
        <script src="https://embed.twitch.tv/embed/v1.js"></script>
        <script type="text/javascript">
          new Twitch.Embed("twitch-embed", {
            width: "100%",
            height: 600,
            channel: "VanSkull",
            theme: "light",
          });
        </script>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    <script type="text/javascript" src="js/changepage.js"></script>
    

</html>