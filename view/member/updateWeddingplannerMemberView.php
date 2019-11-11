<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche"; ?>

<?php $page_subtitle = "Créer un nouvel épisode"; ?>

<?php ob_start(); ?>
    <form action="index.php?action=updateWeddingplannerMember&amp;weddingplannerId=<?= $weddingplanner['id'] ?>" method="post" enctype="multipart/form-data">
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="pseudo" value="<?= htmlspecialchars($weddingplanner['pseudo']) ?>" required>
		<input type="text" name="specialty" value="<?= htmlspecialchars($weddingplanner['specialty']) ?>" required>
	    <textarea name="presentation" value="<?= htmlspecialchars($weddingplanner['presentation']) ?>" required></textarea><br />
		<input type="text" name="website" value="<?= htmlspecialchars($weddingplanner['website']) ?>">
		<input type="text" name="tel" value="<?= htmlspecialchars($weddingplanner['tel']) ?>" required>		
		<input type="email" name="mail" value="<?= htmlspecialchars($weddingplanner['mail']) ?>" required>		
	    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour la Wedding-Planner">
	    <button class="btn btn-primary"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
