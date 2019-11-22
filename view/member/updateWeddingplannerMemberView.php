<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Mise à jour de la Wedding-Planner"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="update-form">
    <form class="form" action="index.php?action=updateWeddingplannerMember&amp;weddingplannerId=<?= $weddingplanner['id'] ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">	
			<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
			<input type="file" name="image" /><br /><br />
		</div>
		<div class="form-group">
			<label for="pseudo"><strong>Nom de l'entreprise</strong></label><br />
			<input type="text" name="pseudo" value="<?= htmlspecialchars($weddingplanner['pseudo']) ?>" required>
		</div>
		<div class="form-group">
		<label for="specialty"><strong>Type de prestation proposée</strong></label><br />
		<select name="specialty" required>
			<option value="">--Merci de choisir une option--</option>
			<option value="Mariage bohème">Mariage bohème</option>
			<option value="Mariage intimiste">Mariage intimiste</option>
			<option value="Mariage haut de gamme">Mariage haut de gamme</option>
			<option value="Mariage de plage">Mariage de plage</option>
			<option value="Mariage de montagne">Mariage de montagne</option>
			<option value="Mariage insolite">Mariage insolite</option>
		</select>
		</div>
		<div class="form-group">
			<label for="presentation"><strong>Présentation de l'entreprise</strong></label><br />
			<textarea name="presentation" required><?= htmlspecialchars($weddingplanner['presentation']) ?></textarea><br />
		</div>
		<div class="form-group">
			<label for="website"><strong>Site Web</strong></label><br />
			<input type="text" name="website" value="<?= htmlspecialchars($weddingplanner['website']) ?>">
		</div>
		<div class="form-group">
			<label for="tel"><strong>Téléphone</strong></label><br />
			<input type="text" name="tel" value="<?= htmlspecialchars($weddingplanner['tel']) ?>" required>
		</div>
		<div class="form-group">		
			<label for="mail"><strong>Email</strong></label><br />
			<input type="email" name="mail" value="<?= htmlspecialchars($weddingplanner['mail']) ?>" required>		
		</div>		
	    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour la Wedding-Planner">
	</form>
	<button class="btn btn-primary cancel-update"><a href="index.php">Annuler</a></button>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
