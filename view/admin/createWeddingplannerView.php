<?php $image_page = ""; ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche"; ?>

<?php $page_subtitle = "Créer un nouvel épisode"; ?>

<?php $main_content_title = "Vous êtes sur le point de créer un nouvel épisode "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createWeddingplanner" method="post" enctype="multipart/form-data">
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<label for="pseudo"><strong>Nom du prestataire</strong></label><br />
		<input type="text" name="pseudo" required>
		<label for="specialty"><strong>Description du prestataire</strong></label><br />
		<input type="text" name="specialty" required>
	    <label for="presentation"><strong>Description du lieu de réception</strong></label><br />
	    <textarea name="presentation" required></textarea><br />
		<input type="text" name="website">
		<input type="text" name="tel" required>		
		<input type="email" name="email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Publier l'épisode">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
