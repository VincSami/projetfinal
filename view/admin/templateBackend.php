<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Mariage et Coquillages</title>
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
                <a class="nav-link" href="index.php?action=placesAdmin">Lieux de réception</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=weddingplannersAdmin">Wedding Planners</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="index.php?action=helpersAdmin">Prestataires</a>
              </li>
            </ul>
            <div id="infoSession">
            <p id="helloMember"><?php echo 'Bonjour ' . $_SESSION['pseudo'] . ' !'; ?></p>
            <button id="exitMember" class="btn btn-primary"><a href ="index.php?action=disconnect">Se déconnecter</a></button>
          </div>
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
            <a href="callto:0262585954">0262 58 59 54</a><br><br>
            <a href="mailto:mariageetcoquillages@gmail.com">mariageetcoquillages@gmail.com</a><br>
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
    <?= $script ?>
  </body>
</html>