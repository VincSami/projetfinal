<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche"; ?>

<?php $page_subtitle = "Ajouter une nouvelle Wedding-Planner"; ?>

<?php ob_start(); ?>
<section class="create-form">
<form class="form" action="index.php?action=createWeddingplannerAdmin&amp;authorId=<?= $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
		<input type="file" name="image" /><br /><br />
	</div>
	<div class="form-group">
		<label for="pseudo"><strong>Nom de l'entreprise</strong></label><br />
		<input type="text" name="pseudo" placeholder="Nom de votre entreprise" required>
	</div>
	<div class="form-group">
	<label for="specialty"><strong>Type de prestation proposée</strong></label><br />
	<select name="specialty" required>
		<option value="">--Merci de choisir une option--</option>
		<option value="1">Mariage bohème</option>
		<option value="2">Mariage intimiste</option>
		<option value="3">Mariage haut de gamme</option>
		<option value="4">Mariage de plage</option>
		<option value="5">Mariage de montagne</option>
		<option value="6">Mariage insolite</option>
	</select>
	</div>
	<div class="form-group">
		<label for="presentation"><strong>Présentation de l'entreprise</strong></label><br />
		<textarea rows="10" cols="100" name="presentation" placeholder="Description de vos services" required></textarea><br />
	</div>
	<div class="form-group">
		<label for="website"><strong>Site Web</strong></label><br />
		<input type="text" name="website" placeholder="Url de votre site Web">
	</div>
	<div class="form-group">
		<label for="tel"><strong>Téléphone</strong></label><br />
		<input type="text" name="tel" placeholder="Votre n° de téléphone" required>
	</div>
	<div class="form-group">		
		<label for="mail"><strong>Email</strong></label><br />
		<input type="email" name="mail" placeholder="Votre email" required>		
	</div>	
    <input class="btn btn-primary" type="submit" name="submit" value="Publier le prestataire">
</form>
<button class="btn btn-primary cancel-create"><a href="index.php">Annuler</a></button>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>
