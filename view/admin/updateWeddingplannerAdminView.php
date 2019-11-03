<?php $image_page = ""; ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche"; ?>

<?php $page_subtitle = "Créer un nouvel épisode"; ?>

<?php $main_content_title = "Vous êtes sur le point de créer un nouvel épisode "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=updateWeddingplannerAdmin&amp;weddingplannerId=<?= $weddingplanner['id'] ?>" method="post" enctype="multipart/form-data">
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="pseudo" value="<?= $weddingplanner['pseudo'] ?>" required>
		<input type="text" name="specialty" value="<?= $weddingplanner['specialty'] ?>" required>
	    <textarea name="presentation" value="<?= $weddingplanner['presentation'] ?>" required></textarea><br />
		<input type="text" name="website" value="<?= $weddingplanner['website'] ?>">
		<input type="text" name="tel" value="<?= $weddingplanner['tel'] ?>" required>		
		<input type="email" name="mail" value="<?= $weddingplanner['mail'] ?>" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Mettre à jour la Wedding-Planner">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
