<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/weddingPlanner<?= $weddingplanner['id'] ?>.jpg" alt="image prestataire">
<?php $image_page = ob_get_clean(); ?>

<?php $page_title = "" ?>

<?php $page_subtitle = "Modifier la Wedding-Planner : " . $weddingplanner['pseudo'] ?>

<?php $main_content_title = "Vous êtes sur le point de modifier cette Wedding-Planner "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<form action="index.php?action=updateWeddingplanner" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<label for="pseudo"><strong>Nom de la Wedding-Planner</strong></label><br />
		<input type="text" name="pseudo" required>
	    <label for="presentation"><strong>Présentation de la Wedding-Planner</strong></label><br />
	    <textarea name="presentation" required></textarea><br />
		<input type="text" name="website">
		<input type="text" name="tel" required>		
		<input type="email" name="email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Mettre à jour la Wedding-Planner">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
