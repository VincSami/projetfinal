<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'un nouveau prestataire"; ?>

<?php $page_subtitle = "Ajouter un nouveau prestataire"; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter un nouveau prestataire "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<form action="index.php?action=createHelperMember&amp;authorId=<?= $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
		<input class="boutonVert" type="file" name="image" /><br /><br />
	</div>
	<div class="form-group">
	<label for="pseudo"><strong>Nom de l'entreprise</strong></label><br />
	<input type="text" name="pseudo" placeholder="Nom de votre entreprise" required>
	</div>
	<div class="form-group">
	<label for="helperType"><strong>Type de prestation proposée</strong></label><br />
	<select name="helperType" required>
		<option value="">--Merci de choisir une option--</option>
		<option value="1">Photographe</option>
		<option value="2">Fleuriste</option>
		<option value="3">Loueur de voitures et motos</option>
		<option value="4">Vendeur et loueur de robes de mariée</option>
		<option value="5">Vendeur et loueur de costumes de marié</option>
		<option value="6">Traiteur</option>
		<option value="7">Pattiserie</option>
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
	<input type="text" name="tel" placeholder="Votre n° de téléphone" required>
	</div>
	<div class="form-group">		
	<label for="mail"><strong>Email</strong></label><br />
	<input type="email" name="mail" placeholder="Votre email" required>		
	</div>	
    <input class="boutonVert" type="submit" name="submit" value="Publier le prestataire">
</form>
<button class="boutonRouge"><a href="index.php">Annuler</a></button>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
