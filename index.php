<?php
    include('exe/bdd.php');
    session_start();
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>MMI d'OR 2021 - 8e édition</title>
        
        <!-- Métadonnées -->
        <meta name="author" content="" />
        <meta name="description" content="" />
        <meta name="keywords" content="" />
        <link rel="icon" href="images/favicon.png" type="image/png" />        
        <meta property="og:title" content="MMI d'OR 2021 - 8e édition"/>
        <meta property="og:url" content="https://mmidor.fr"/>
        <meta property="og:type" content="website" />
        <meta property="og:locale" content="FR" />
        <meta property="og:description" content="Ici vous trouverez toutes les informations concernant la 8ème édition des MMI D'OR"/>
        <meta property="og:image" content="https://mmidor.fr/images/favicon.png"/>
        <meta name="viewport" content="width=device-width"/>
        <!-- Google Fonts -->
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Josefin+Sans:400,400i,600,600i,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Shadows+Into+Light&display=swap" rel="stylesheet">
        
        <!-- Fonts Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
        
        <!-- Feuilles de style -->
        <link href="css/normalize.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" media='screen and (min-width: 200px) and (max-width: 700px)' href='css/mobile_style.css' />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="screen and (min-width: 700px)"/>
        <!-- Bibliothèques JavaScript -->
    <script type="text/javascript" src="js/jquery.js"></script>
    </head>
    <body id="load">
    <?php
    if(empty($_GET)){?>
        <div id="loader-wrapper">
                <div id="loader"></div>
    
                <div class="loader-section section-left"></div>
                <div class="loader-section section-right"></div>
    
        </div>
    <?php
    }
    ?>
        <!-- Page principal -->
        <div id="main-contain">
    <?php
        if(isset($_GET['mail']) && $_GET['mail'] == "ok"){
            echo "<div id='msg'>
                <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                <p>Merci pour ton message!<br/>
                Nous te répondrons par mail alors n'hésite pas à jeter un œil dans tes mails régulièrement.</p>
                <a href='index.php'>X</a>
                </div>";
        }
        if(isset($_GET['error'])){
            if($_GET['error'] == "champ"){
                echo "<div id='msg'>
                    <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                    <p>Désolé, il semble qu'il y ai un soucis avec les informations que tu as fournies.</p>
                    <a href='index.php'>X</a>
                    </div>";
            }
            if($_GET['error'] == "mail"){
                echo "<div id='msg'>
                    <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                    <p>Désolé, il semble qu'il y ai une erreur dans l'adresse mail fournie.</p>
                    <a href='index.php'>X</a>
                    </div>";
            }
            if($_GET['error'] == "full"){
                echo "<div id='msg'>
                    <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                    <p>Désolé, vous avez atteint votre nombre maximum de votes.</p>
                    <a href='index.php'>X</a>
                    </div>";
            }
            if($_GET['error'] == "notlog"){
                echo "<div id='msg'>
                    <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                    <p>Veuillez vous connecter pour voter !</p>
                    <a href='index.php'>X</a>
                    </div>";
            }
        }
        if(isset($_GET['credit']) && $_GET['credit'] == "ok"){
            echo "<div id='msg' class='copy'>
                <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                <div id='copyright-contenu'>
                    <h3>Développeurs :</h3>
                    <nav>
                        <ul>
                            <li><a target='_blank' href='http://mathisdeplanque.fr'>Mathis Deplanque</a></li>
                            <li><a target='_blank' href='https://valentinvanhaecke.fr/'>Valentin Vanhaecke</a></li>
                        </ul>
                    </nav>
                    <h3>Designer Web :</h3>
                    <nav>
                        <a target='_blank' href='https://www.facebook.com/vivi.walrt'>Victor Wallart</a>
                    </nav>
                </div>
                <a href='index.php'>X</a>
                </div>";
        }
        if(isset($_GET['msg']) && $_GET['msg'] == "connection"){
            echo "<div id='msg'>
                <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                <p>Tu as le droit à 8 votes que tu peux attribuer librement mais attention, un vote ne se retire pas ;)</p>
                <a href='index.php'>X</a>
                </div>";
        }
        if(isset($_GET['vote']) && $_GET['vote'] == "ok"){
            $sql = "SELECT * FROM films WHERE id=?";
            $q = $pdo->prepare($sql);
            $q->execute(array($_GET['id']));
            if($line=$q->fetch()){
                $title = $line['title'];
            }
            echo "<div id='msg'>
                <img alt='Logo MMI D\'OR' src='images/favicon.png'>
                <p>Ton vote pour " . $title . " a bien été comptabilisé !</p>
                <a href='index.php'>X</a>
                </div>";
        }
    ?>
            
            <!-- Menu principal -->
            <div id="main-menu">
                <!-- Logo -->
                <div id="menu-logo">
                    <a href=""><img id="logo-site" src="images/favicon.png" alt="Logo_MMI_OR_2021" /><a>
                </div>
                
                <!-- Séparateur -->
                <div id="menu-marker">
                </div>
                
                <!-- Menu navigation -->
                <div id="menu-navigation">
                    <nav id="pc">
                        <li class="active" id="li-home"><a href="#section-home" class="scroll-horizontal" id="accueil"></a></li>
                        <li id="li-films"><a href="#section-films" class="scroll-horizontal" id="films"></a></li>
                        <li id="li-planning"><a href="#section-planning" class="scroll-horizontal" id="planning"></a></li>
                        <li id="li-concours"><a href="#section-competition" class="scroll-horizontal" id="concours"></a></li>
                        <li id="li-contact"><a href="#section-contact" class="scroll-horizontal" id="contact"></a></li>
                        <?php
                            if(!isset($_SESSION['id'])){
                                echo "<li id='li-user'><a id='connexion' href='connexion.php'></a></li>";
                            }
                            else{
                                echo "<li id='li-user'><a id='deconnexion' href='exe/deconnexion.php'></a></li>";
                            }
                        ?>
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
                    <p id="copyright-text"><a href='index.php?credit=ok' id='copyright-link'>©2021 MMI D'OR</a></p>
                </div>                
            </div>
            <img src="images/favicon.png" alt="logo_tel" id="logo_tel">
            <nav id="mobile" role="navigation">
                <div id="menuToggle">
                    <!--
                    A fake / hidden checkbox is used as click reciever,
                    so you can use the :checked selector on it.
                    -->
                    <input type="checkbox" />

                    <!--
                    Some spans to act as a hamburger.

                    They are acting like a real hamburger,
                    not that McDonalds stuff.
                    -->
                    <span></span>
                    <span></span>
                    <span></span>

                    <!--
                    Too bad the menu has to be inside of the button
                    but hey, it's pure CSS magic.
                    -->
                    <ul id="menu">
                        <a href="#section-home"><li>ACCUEIL</li></a>
                        <a href="#section-films"><li>FILMS</li></a>
                        <a href="#section-planning"><li>PLANNING</li></a>
                        <a href="#section-competition"><li>CONCOURS</li></a>
                        <a href="#section-contact"><li>CONTACT</li></a>
                    </ul>
                </div>
            </nav>
            <!-- Contenu principal -->
            <div id="main-contenu">
                <div id="contenu-body">
                    <div id="all-sections">
                        <div id="section-home">
                            <div id="home-live-twitch">
                                <div id="twitch-embed"></div>
                            </div>
                            <a href="#home-presentation" class="scroll-horizontal" id="mmi_button"></a>
                            <div id="home-presentation">
                                <div id="home-presentation-contain">
                                    <h3 id="title-home" class="gold-underline">Les MMI <span class="text-title-gold">d'Or</span> ?</h3>
                                    
                                    <div id="home-text">
                                        <img id="home-logo-mmi-or" src="images/favicon.png" alt="Logo_MMI_OR_2021" />
                                        <p id="home-text-">Les <b>MMI D'OR</b> est une cérémonie culturelle qui permet de diffuser et surtout de récompenser les films réalisés par les étudiants en DUT MMI de Lens.<br/>
                                        Cette cérémonie permet de promouvoir le travail des étudiants et des acteurs qui ont tourné dans les films.</p>
                                    </div>
                                </div>                                
                            </div>
                        </div>
                        <div id="section-films">
                            <div class="links">
                                <h3 id="title-films" class="gold-underline">Tous les <span class="text-title-gold">films</span></h3>
                                <div id="films-affichage">
                                    <div id="all-films">
                                        <?php
                                            $sql = "SELECT * FROM films";
                                            $q = $pdo->prepare($sql);
                                            $q->execute();
                                            while($line=$q->fetch()) {
                                                echo "<div id=" . $line['title'] . " class='card-film'>
                                                            <div class='film-poster'>
                                                                <div class='film-poster-vote'>
                                                                    <a href='exe/vote.php?id=". $line['id'] ."'>VOTER</a>
                                                                </div>
                                                                <div id='poster-2nuts' class='film-poster-image' style='background-image: url(images/affiches/" . $line['image'] . ");)'>
                                                                    <div class='film-overlay-play'>
                                                                        <i class='fa fa-play'></i>
                                                                    </div>
                                                                    <a class='openpop' href='films.php?id=" . $line['id'] . "' id='film-link'></a>
                                                                </div>
                                                            </div>
                                                            <div class='film-synopsis'>
                                                                <h4 class='film-title'>" . $line['title'] . "</h4>
                                                                <p class='film-synopsis-text'>" . $line['synopsis'] . "</p>
                                                            </div>
                                                        </div>";
                                            }
                                        ?>
                                    </div>
                                    <div id="end">
                                        <div id="end-img">
                                            <img src="images/popcorn.png" alt="Sceau de popcorn">
                                        </div>
                                        <div id="end-text">
                                            <p>Bon<br/>Visionnage !</p>
                                        </div>
                                    </div> 
                                </div>
                            </div> 
                            <div class="wrapper">
                                        <div class="popup">
                                            <iframe id="popup" src="">
                                                <p>Your browser does not support iframes.</p>
                                            </iframe>
                                            <a href="#" class="close">X</a>

                                        </div>
                                    </div>            
                        </div>
                        <div id="section-planning">
                            <div class="body-section">
                                <h3 id="title-planning" class="gold-underline">Plan<span class="text-title-gold">ning</span></h3>
                                
                                <table id="planning-array">
                                    <tr>
                                        <th class="gold-underline">Horaires</th>
                                        <th class="gold-underline">Déroulement</th>
                                    </tr>
                                    <tr>
                                        <td>17h50</td>
                                        <td>Pré-Live | Patience, le live commence bientôt !</td>
                                    </tr>
                                    <tr>
                                        <td>18h00</td>
                                        <td>Lancement du Live | Bon visionnage !</td>
                                    </tr>
                                    <tr>
                                        <td>18h45</td>
                                        <td>Pause...</td>
                                    </tr>
                                    <tr>
                                        <td>19h00</td>
                                        <td>Reprise du Live</td>
                                    </tr>
                                    <tr>
                                        <td>19h45</td>
                                        <td>Vote de Films | Résultats | Discours</td>
                                    </tr>
                                    <tr>
                                        <td>21h00</td>
                                        <td>Fin du Live</td>
                                    </tr>
                                </table>
                            </div>                            
                        </div>
                        <div id="section-competition">
                            <h3 id="title-competition" class="gold-underline">Participez à notre <span class="text-title-gold">concours</span></h3>
                            
                            <div id="competition-contain">
                                <div id="view-gifts">
                                    <div>
                                    <img id="gift1" class="gift-img" src="images/template.png" alt="Cadeau_1" />
                                    <p>Cadeau 1</p>
                                    </div>
                                    <div>
                                    <img id="gift2" class="gift-img" src="images/template.png" alt="Cadeau_2" />
                                    <p>Cadeau 2</p>
                                    </div>
                                    <div>
                                    <img id="gift3" class="gift-img" src="images/template.png" alt="Cadeau_3" />
                                    <p>Cadeau 3</p>
                                    </div>
                                    <div>
                                    <img id="gift4" class="gift-img" src="images/template.png" alt="Cadeau_4" />
                                    <p>Cadeau 4</p>
                                    </div>
                                    <div>
                                    <img id="gift5" class="gift-img" src="images/template.png" alt="Cadeau_5" />
                                    <p>Cadeau 5</p>
                                    </div>
                                </div>
                                <div id="inscription-competition">
                                    <p id="inscription-text">Inscrivez-vous sur notre <span class="text-title-gold">site</span> !</br>
                                    Vous serez <span class="text-title-gold">automatiquement inscrit</span> dans la liste des participants !
                                    </p>
                                    <?php
                                        if(!isset($_SESSION['id'])){
                                            echo "<a href='connexion.php' id='connexion_concours'>INSCRIPTION</a>";
                                        }
                                        else{
                                            echo "<p id='connexion_concours'>Vous êtes déjà inscrit !</p>";
                                        }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <div id="section-contact">
                            <div class="body-section">
                                <h3 id="title-contact" class="gold-underline">Contact</h3>
                                
                                <div id="contact-contain">
                                    <div id="contact-infos">
                                        <img src="images/contacticon.png" alt="Logo contact" id="contact-img">
                                        <p id="contact-infos-phone"><i class="fa fa-phone"></i> +33 1 23 45 67 89</p>
                                        <a href="mailto:mmidor2021@gmail.com" class="mail"><p id="contact-infos-email"><i class="fa fa-envelope"></i> mmidor2021@gmail.com</p></a>
                                    </div>
                                    <div id="contact-form">
                                        <h2>Une question ?</h2>
                                        <form action="exe/contact.php" method="post">
                                            <input type="text" id="form-contact-name" name="name" placeholder="Nom Prénom*" required /><br/>
                                            <input type="email" id="form-contact-mail" name="mail" placeholder="Email*" required /><br/>
                                            <input type="tel" id="form-contact-tel" name="tel" placeholder="Téléphone*" required pattern="[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}[0-9]{2}"/><br/>
                                            <textarea id="form-message" name="message" placeholder="Écrivez votre message ici..." required></textarea><br/>
                                            <input type="submit" id="form-contact-button" value="Envoyer" />
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
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
            parent: ["mmidor.fr", "www.mmidor.fr"]
          });
        </script>
        <script>
            if (screen && screen.width > 700) {
                document.write('<script type="text/javascript" src="js/scroll.js"><\/script>');
            }
        </script>
    </body>
    <script type="text/javascript" src="js/changepage.js"></script>
    <script type="text/javascript" src="js/popup.js"></script>
    <script type="text/javascript" src="js/loaded.js"></script>
    

</html>