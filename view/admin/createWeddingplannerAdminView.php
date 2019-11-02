<?php $image_page = ""; ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche"; ?>

<?php $page_subtitle = "Créer un nouvel épisode"; ?>

<?php $main_content_title = "Vous êtes sur le point de créer un nouvel épisode "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createWeddingplanner" method="post" enctype="multipart/form-data">
	<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="pseudo" placeholder="Nom de votre entreprise" required>
		<input type="text" name="specialty" placeholder="Spécialité" required>
	    <textarea name="presentation" placeholder="Description de vos services" required></textarea><br />
		<input type="text" name="website" placeholder="Url de votre site Web">
		<input type="text" name="tel" placeholder="Numéro de télephone" required>		
		<input type="email" name="email" placeholder="Email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Publier l'épisode">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
