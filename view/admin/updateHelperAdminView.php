<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/helper<?= $helper['id'] ?>.jpg" alt="image prestataire">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "" ?>

<?php $page_subtitle = "Modifier le prestataire : " . $helper['pseudo'] ?>

<?php $main_content_title = "Vous êtes sur le point de modifier ce prestataire "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<form action="index.php?action=updateHelperAdmin" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<label for="pseudo"><strong>Nom du prestataire</strong></label><br />
		<input type="text" name="pseudo" required>
	    <label for="presentation"><strong>Description du prestataire</strong></label><br />
	    <textarea name="presentation" required></textarea><br />
		<input type="text" name="website">
		<input type="text" name="tel" required>		
		<input type="email" name="email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Mettre à jour le prestataire">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
