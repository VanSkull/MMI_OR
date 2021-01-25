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
                    <a href="#"><img id="logo-site" src="images/favicon.png" alt="Logo_MMI_OR_2021" /><a>
                </div>
                
                <!-- Séparateur -->
                <div id="menu-marker">
                </div>
                
                <!-- Menu navigation -->
                <div id="menu-navigation">
                    <nav>
                        <li><a href="" id="accueil">MMI D'OR</a></li>
                        <li><a href="#film" id="films">FILMS</a></li>
                        <li><a href="#planning" id="planning">PLANNING</a></li>
                        <li><a href="#concours" id="concours">CONCOURS</a></li>
                        <li><a href="#contact" id="contact">CONTACT</a></li>
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
            
            <!-- Contenu principal -->
            <div id="main-contenu">
                <div id="contenu-body">
                    <div id="all-sections">
                        <div id="section-home" class="unable">
                            <div id="home-live-twitch">
                                <div id="twitch-embed"></div>
                            </div>
                            <a href="#arrive-scroll" class="scroll-horizontal" id="mmi_button"></a>
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
                            <div id="arrive-scroll"></div>
                        </div>
                        <div id="section-films" class="unable">
                            <div class="body-section">
                                <h3 id="title-films" class="gold-underline">Tous les <span class="text-title-gold">films</span></h3>
                                
                                <div id="all-films">
                                    <?php
                                        $sql = "SELECT * FROM films";
                                        $q = $pdo->prepare($sql);
                                        $q->execute();
                                        while($line=$q->fetch()) {
                                            echo "<div id=" . $line['title'] . " class='card-film'>
                                                        <div class='film-poster'>
                                                            <div class='film-poster-vote'>
                                                                <a href='vote.php?id=". $line['id'] ."'>VOTER</a>
                                                            </div>
                                                            <div id='poster-2nuts' class='film-poster-image' style='background-image: url(images/affiches/" . $line['image'] . ");)'>
                                                                <div class='film-overlay-play'>
                                                                    <i class='fa fa-play'></i>
                                                                </div>
                                                                <a href='films.php?id=" . $line['id'] . "' id='film-link'></a>
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
                        <div id="section-planning" class="current">
                            <div class="body-section">
                                <h3 id="title-planning" class="gold-underline">Plan<span class="text-title-gold">ning</span></h3>
                                
                                <table id="planning-array">
                                    <tr>
                                        <th>Horaires</th>
                                        <th>Déroulement</th>
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
                        <div id="section-competition" class="unable">
                            <h3 id="title-competition" class="gold-underline">Participez à notre <span class="text-title-gold">concours</span></h3>
                            
                            <div id="competition-contain">
                                <div id="view-gifts">
                                    <img id="gift1" class="gift-img" src="images/gift1.png" alt="Cadeau_1" />
                                    <img id="gift2" class="gift-img" src="images/gift2.png" alt="Cadeau_2" />
                                    <img id="gift3" class="gift-img" src="images/gift3.png" alt="Cadeau_3" />
                                    <img id="gift4" class="gift-img" src="images/gift4.png" alt="Cadeau_4" />
                                    <img id="gift5" class="gift-img" src="images/gift5.png" alt="Cadeau_5" />
                                </div>
                                <div id="inscription-competition">
                                    <p id="inscription-text">Inscrivez-vous à notre concours pour tenter de gagner de nombreux cadeaux !!!</p>
                                    <form id="form-inscription" action="#" method="post">
                                        <label id="label-competition-name" for="form-competition-name"></label>
                                        <input type="text" id="form-competition-name" name="name" required />
                                        <label id="label-competition-mail" for="form-competition-mail"></label>
                                        <input type="email" id="form-competition-name" name="mail" required />
                                        <input type="submit" id="form-competition-button" value="Je participe" />
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div id="section-contact" class="unable">
                            <h3 id="title-contact" class="gold-underline">Une <span class="text-title-gold">question</span> ? Contactez-nous !</h3>
                            
                            <div id="contact-contain">
                                <div id="contact-form">
                                    <form action="#" method="post">
                                        <label for="form-contact-name" id="label-contact-name">Nom<sup class="sign-obligation">*</sup></label>
                                        <input type="text" id="form-contact-name" name="name" required />
                                        <label for="form-contact-mail" id="label-contact-mail">E-mail<sup class="sign-obligation">*</sup></label>
                                        <input type="email" id="form-contact-mail" name="mail" required />
                                        <textarea id="form-message" name="message" placeholder="Votre message..." required></textarea>
                                        <input type="submit" id="form-contact-button" value="Envoyer" />
                                    </form>
                                </div>
                                <div id="contact-infos">
                                    <p id="contact-infos-phone"><i class="fa fa-phone"></i> +33 1 23 45 67 89</p>
                                    <p id="contact-infos-email"><i class="fa fa-envelope"></i> contact.mmidor2021@gmail.com</p>
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
          });
        </script>
    </body>
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/active.js"></script>
    <script type="text/javascript" src="js/scroll.js"></script>
    

</html>