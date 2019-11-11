<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Mariage & Coquillages</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link rel="stylesheet" href=https://bootswatch.com/4/lux/bootstrap.min.css>
        <link href="public/css/style.css" rel="stylesheet" /> 
        <?= $linkrel ?>
    </head>
        
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">Accueil<span class="sr-only">(current)</span></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=places">Lieux de réception</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=weddingplanners">Wedding Planners</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="index.php?action=helpers&amp;pageId=">Prestataires</a>
                        </li>
                    </ul>
                </div>
                <div>
                    <button id="memberButton" class="btn btn-primary">S'identifier</button>
                    <form id="memberAccess" action="index.php?action=connect" method="post">
                        <div class="form-group">
                            <label for="pseudoMember">Pseudo</label>
                            <input type="text" class="form-control" name="pseudoMember" id="pseudoMember" aria-describedby="pseudoHelp" placeholder="Votre pseudo">
                        </div>
                        <div class="form-group">
                            <label for="passMember">Mot de passe</label>
                            <input type="password" class="form-control" name="passMember" id="passMember" placeholder="Votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary">S'identifier</button>
                    </form>
                    <div id="cancelSubscribeButtons">
                  	<button id="cancelMemberAccess" class="btn btn-primary">Annuler</button>
                    <button id="subscribeMember" class="btn btn-primary">Pas encore membre ? Inscrivez-vous !</button>
                    <div>
                    <form id="memberSubscription" action="index.php?action=subscribe" method="post">
                        <div class="form-group">
                            <label for="pseudoSubscriber">Pseudo</label>
                            <input type="text" class="form-control" name="pseudoSubscriber" id="pseudoSubscriber" aria-describedby="pseudoHelp" placeholder="Votre pseudo">
                        </div>    
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Votre email">
                            <small id="emailHelp" class="form-text text-muted">Nous ne partagerons jamais votre email.</small>
                        </div>
                        <div class="form-group">
                            <label for="passSubscriber">Mot de passe</label>
                            <input type="password" class="form-control" name="passSubscriber" id="passSubscriber" placeholder="Votre mot de passe">
                        </div>
                        <button type="submit" class="btn btn-primary">S'inscrire</button>
                    </form>
                    <button id="cancelMemberSubscription" class="btn btn-primary">Annuler</button>
                </div>
            </nav>
            <div class="titres-page">
            <h3><?= $page_title ?></h3>
            <h4><?= $page_subtitle ?></h4>
            </div>
            <?= $image_page ?>
        </header>

        <?= $main_content ?>

        <footer>
            <div id="contact">
              <h2>Mariage & Coquillages</h2>
              <p>19, rue de Belleville 31000<br><br>
                <a href= "callto:0800112205">0 800 112 205</a><br><br>
                <a href= "mailto:mariageetcoquillage@gmail.com">mariageetcoquillage@gmail.com</a><br>
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
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="public/js/member.js"></script>
        <?= $script ?>
    </body>
</html>