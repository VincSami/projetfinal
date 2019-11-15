<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8" />
    <title>Jean Forteroche</title>
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
              <a class="nav-link" href="index.php?action=placesAdmin">Lieux de réception</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php?action=weddingplannersAdmin">Wedding Planners</a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="index.php?action=helpersAdmin">Prestataires</a>
          </li>
        </ul>
      </div>
      <div id="infoSession">
        <p id="helloAdmin"><?php echo 'Bonjour ' . $_SESSION['pseudo'] . ' !'; ?></p>
        <button class="btn btn-primary" id="exitAdmin"><a href ="index.php?action=disconnect">Se déconnecter</a></button>
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
        <p>19, rue de la Rivière 97400<br><br>
          <a href= "callto:0262595854">0262 59 58 54</a><br><br>
          <a href= "mailto:mariagecoquillages@reunion.com">mariagecoquillages@reunion.com</a><br>
        </p>
      </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <?= $script ?>
  </body>
</html>