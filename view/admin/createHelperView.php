<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'un nouveau prestataire"; ?>

<?php $page_subtitle = "Ajouter un nouveau prestataire"; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter un nouveau prestataire "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createHelper" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<label for="pseudo"><strong>Nom du prestataire</strong></label><br />
		<input type="text" name="pseudo" required>
	    <label for="presentation"><strong>Description du lieu de réception</strong></label><br />
	    <textarea name="presentation" required></textarea><br />
		<input type="text" name="website">
		<input type="text" name="tel" required>		
		<input type="email" name="email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Publier le prestataire">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
