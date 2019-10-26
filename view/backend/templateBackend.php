<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <title>Jean Forteroche</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css?family=Gayathri&display=swap" rel="stylesheet">
        <link href="public/css/style.css" rel="stylesheet" /> 
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
                        <a class="nav-link" href="index.php">Accueil <span class="sr-only">(current)</span></a>
                      </li>
                      <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          Billet simple pour l'Alaska
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <?php 
                          foreach ($posts as $post)
                          {
                          ?>
                          <a class="dropdown-item" href="index.php?action=postAdmin&amp;id=<?= $post['id'] ?>"> <?= $post['title'] ?> </a>
                          <?php
                          }
                          ?>
                        </div>
                      </li>
                    </ul>
                <div id="infoSession">
                <p id="helloAdmin"><?php echo 'Bonjour ' . $_SESSION['pseudo'] . ' !'; ?></p>
                <button class="boutonRouge" id="exitAdmin"><a href ="index.php?action=disconnect">Se déconnecter</a></button>
                </div>
                </div>
            </nav>
            <?= $image_post ?>
            <div id="titre_principal">
            <h1><?= $page_title ?></h1><br>
            <h2><?= $page_subtitle ?></h2>
            </div>
        </header>

        <section id="introduction">
          <h2><?= $main_content_title ?></h2>
          <p><?= $main_content_subtitle ?></p>
          <?= $creation_post ?>
        </section> 

        <section id="main_content">
          <article>
          <?= $article_content ?>
          </article>
          <aside>
            <img src="public/img/avatar.jpg" alt="portrait auteur">
            <h2>Jean Forteroche</h2>
            <p>ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.
            ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
            tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
            quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
            consequat.</p>
          </aside>
        </section>

        <section id="comments">
          <?= $comment_content ?>
        </section>

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

        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/uieuh603nflj6edzyxfvvoeiyut4ea1meflkbv78itiw9awg/tinymce/5/tinymce.min.js"></script>
        <script src="public/js/backend.js"></script>
    </body>
</html>