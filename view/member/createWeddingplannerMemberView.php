<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'une nouvelle Wedding-Planner"; ?>

<?php $page_subtitle = "Ajouter une nouvelle Wedding-Planner"; ?>

<?php ob_start(); ?>
<section class="create-form">
<form class="form creationForm" action="index.php?action=createWeddingplannerMember&amp;authorId=<?= $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
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
		<option value="Mariage bohème">Mariage bohème</option>
		<option value="Mariage intimiste">Mariage intimiste</option>
		<option value="Mariage haut de gamme">Mariage haut de gamme</option>
		<option value="Mariage de plage">Mariage de plage</option>
		<option value="Mariage de montagne">Mariage de montagne</option>
		<option value="Mariage insolite">Mariage insolite</option>
	</select>
	</div>
	<div class="form-group">
		<label for="presentation"><strong>Présentation de l'entreprise</strong></label><br />
		<textarea name="presentation" placeholder="Description de vos services" required></textarea><br />
	</div>
	<div class="form-group">
		<label for="website"><strong>Site Web</strong></label><br />
		<input type="text" name="website" placeholder="Url de votre site Web">
	</div>
	<div class="form-group">
		<label for="tel"><strong>Téléphone</strong></label><br />
		<input class="phoneNumber" type="text" name="tel" placeholder="0123456789" required>
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

<?php ob_start(); ?>
<script src="public/js/formPhoneNumberVerify.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
