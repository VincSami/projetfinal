<?php $image_page = ""; ?>

<?php $page_title = "Création d'un nouveau lieu de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point de créer un nouveau lieu de réception "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createPlace" method="post" enctype="multipart/form-data">
	<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="title" placeholder="Nom du lieu de réception" required>
		<input type="text" name="city" placeholder="Ville" required>
		<input type="text" name="positionx" placeholder="Position X" required>
		<input type="text" name="positionx" placeholder="Position Y" required>
		<input type="text" name="region" placeholder="Région" required>
		<input type="text" name="website" placeholder="Url de votre site Web">
		<input type="text" name="tel" placeholder="Numéro de téléphone" required>
		<input type="email" name="email" placeholder="Email" required>
	    <textarea name="presentation" placeholder="Présentation du lieu de réception" required></textarea><br />
	    <input class="boutonVert" type="submit" name="submit" value="Ajouter le lieu de réception">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
