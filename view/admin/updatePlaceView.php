<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/place<?= $place['id'] ?>.jpg" alt="image lieu de réception">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "" ?>

<?php $page_subtitle = "Modifier le lieu de réception : " . $place['title'] ?>

<?php $main_content_title = "Vous êtes sur le point de modifier ce lieu de réception "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<form action="index.php?action=updatePlace" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
	    <label for="title"><strong>Nom du lieu de réception</strong></label><br />
		<input type="text" name="title" required>
		<input type="text" name="city" required>
		<input type="text" name="positionx" required>
		<input type="text" name="positionx" required>
		<input type="text" name="region" required>
		<input type="text" name="website">
		<input type="text" name="tel" required>
		<input type="email" name="email" required>
	    <label for="presentation"><strong>Description du lieu de réception</strong></label><br />
	    <textarea name="presentation" required></textarea><br />
	    <input class="boutonVert" type="submit" name="submit" value="Mettre à jour le lieu de réception">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
