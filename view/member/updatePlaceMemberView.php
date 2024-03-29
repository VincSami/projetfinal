<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Mise à jour du lieu de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="update-form">
	<form class="form" action="index.php?action=updatePlaceMember&amp;placeId=<?= $place['id'] ?>" method="post" enctype="multipart/form-data">
		<div class="form-group">	
			<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
			<input class="boutonVert" type="file" name="image" /><br /><br />
		</div>
		<div class="form-group">
		<label for="title"><strong>Nom du lieu de réception</strong></label><br />
		<input type="text" name="title" value="<?= htmlspecialchars($place['title']) ?>" required>
		</div>
		<div class="form-group">
		<label for="city"><strong>Ville</strong></label><br />
		<input type="text" name="city" value="<?= htmlspecialchars($place['city']) ?>" required>
		</div>
		<div class="form-group">
		<label for="positionx"><strong>positionx</strong></label><br />
		<input type="text" name="positionx" value="<?= htmlspecialchars($place['positionx']) ?>">
		</div>
		<div class="form-group">
		<label for="positiony"><strong>positiony</strong></label><br />
		<input type="text" name="positiony" value="<?= htmlspecialchars($place['positionx']) ?>">
		</div>
		<div class="form-group">
		<label for="region"><strong>Région</strong></label><br />
		<input type="text" name="region" value="<?= htmlspecialchars($place['region']) ?>">
		</div>
		<div class="form-group">
		<label for="website"><strong>Site Web</strong></label><br />
		<input type="text" name="website" value="<?= htmlspecialchars($place['website']) ?>">
		</div>
		<div class="form-group">
		<label for="tel"><strong>Téléphone</strong></label><br />
		<input type="text" name="tel" value="<?= htmlspecialchars($place['tel']) ?>" required>
		</div>
		<div class="form-group">		
		<label for="mail"><strong>Email</strong></label><br />
		<input type="email" name="mail" value="<?= htmlspecialchars($place['mail']) ?>" required>		
		</div>	
		<div class="form-group">
		<label for="presentation"><strong>Présentation du lieu de réception</strong></label><br />
	    <textarea name="presentation" required><?= htmlspecialchars($place['presentation']) ?></textarea><br />
		</div>	
	    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour le lieu de réception">
	</form>
	<button class="btn btn-primary cancel-update"><a href="index.php">Annuler</a></button>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
