<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Wedding & Love</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet" /> 
    </head>
        
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="index.php">Accueil</a></li>
                    <li><a href="index.php?action=places">Lieux de réception</a></li>
                    <li><a href="index.php?action=weddingplanners">Wedding Planner</a></li>
                    <li><a href="index.php?action=helpers">Prestataires</a></li>
                </ul>
                <div id="admin">
                    <button class="boutonVert" id="adminButton">S'identifier</button>
                    <form id="adminAccess" action="index.php?action=connect" method="post">
                        <input type="text" id="pseudoMember" name="pseudoMember" placeholder="Identifiant">
                        <input type="password" id="passMember" name="passMember" placeholder="Mot de passe">
                        <button id="submitAccess" type="submit">Se connecter</button>
                    </form>
                    <button class="boutonRouge" id="cancelAdminAccess">Annuler</button>
                    <button class="boutonVert" id="subscribeMember">Pas encore membre ? Inscrivez-vous !</button>
                    <form id="memberSubscription" action="index.php?action=subscribe" method="post">
                        <input type="text" id="pseudoSubscriber" name="pseudoSubscriber" placeholder="Votre pseudo">
                        <input type="password" id="passSubscriber" name="passSubscriber" placeholder="Votre mot de passe">
                        <input type="email" id="email" name="email" placeholder="Votre email">
                        <button id="submitSubscription" type="submit">S'inscrire</button>
                    </form>
                </div>
            </nav>
            <?= $image_page ?>
            <div id="titre_principal">
                <h1><?= $page_title ?></h1><br>
                <h2><?= $page_subtitle ?></h2>
            </div>
        </header>

        <?= $main_content ?>

        <footer>
            <div id="contact">
              <h2>Jean Forteroche</h2>
              <p>19, rue de Belleville 31000<br><br>
                <a href= "callto:0800112205">0 800 112 205</a><br><br>
                <a href= "mailto:jeanforteroche@alaska.com">jeanforteroche@alaska.com</a><br>
              </p>
            </div>
            <div id="social">
              <p>Suivez-moi sur les réseaux sociaux</p>
              <ul>
                  <li><a href="https://www.facebook.com/"><img src="public/img/facebook.png" alt="facebook_icon"></a></li>
                  <li><a href="https://www.instagram.com/"><img src="public/img/instagram.png" alt="instagram_icon"></a></li>
                  <li><a href="https://twitter.com/?lang=fr"><img src="public/img/twitter.png" alt="twitter"></a></li>
              </ul>
              <p><a href="index.php?action=mentions">Mentions légales</a></p>
            </div>
        </footer>
        <script src="public/js/frontend.js"></script>
    </body>
</html>