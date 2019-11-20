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
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
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
                            <a class="nav-link" href="index.php?action=helpers">Prestataires</a>
                        </li>
                    </ul>
                    <?php
                    if (!isset($_SESSION['pseudo']))
                    {
                    ?>
                    <button id="memberButton" class="btn btn-primary">S'identifier</button>
                    <div id="sign-in">
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
                    </div>
                    </div>
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
                        <button id="cancelMemberSubscription" class="btn btn-primary">Annuler</button>
                    </form>
                <?php
                } 
                else 
                {
                ?>
                <div id="infoSession">
                    <p id="helloMember"><?php echo 'Bonjour ' . $_SESSION['pseudo'] . ' !'; ?></p>
                    <button id="memberSpace" class="btn btn-primary"><a href ="index.php?action=profil">Profil</a></button>
                    <button id="exitMember" class="btn btn-primary"><a href ="index.php?action=disconnect">Se déconnecter</a></button>
                </div>
                <?php
                }
                ?>
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
          <h1>Mariage et Coquillages</h1>
          <p>19, rue de la Rivière 97400<br><br>
            0262 58 59 54<br><br>
            <a href="mailto=mariageetcoquillages@gmail.re">mariageetcoquillages@gmail.re</a><br>
          </p>
        </div>
        <div id="social">
          <p>Suivez-moi sur les réseaux sociaux</p>
          <ul>
              <li><a href="#"><img src="public/img/facebook.png" alt="facebook_icon"></a></li>
              <li><a href="#"><img src="public/img/instagram.png" alt="instagram_icon"></a></li>
              <li><a href="#"><img src="public/img/twitter.png" alt="twitter"></a></li>
          </ul>
          <p><a href="index.php?action=mentions">Mentions légales</a></p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/62d3f45e90.js"></script>
    <script src="public/js/member.js"></script>
    <?= $script ?>
    </body>
</html>