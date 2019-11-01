<?php $image_page = ""; ?>

<?php $page_title = "Création d'un nouveau lieu de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point de créer un nouveau lieu de réception "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createPlace" method="post" enctype="multipart/form-data">
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
	    <input class="boutonVert" type="submit" name="submit" value="Ajouter le lieu de réception">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
