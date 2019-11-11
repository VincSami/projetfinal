<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Mise à jour du lieu de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=updatePlaceAdmin&amp;placeId=<?= $place['id'] ?>" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input type="file" name="image" /><br /><br />
		<input type="text" name="title" value="<?= htmlspecialchars($place['title']) ?>" required>
		<input type="text" name="city"  value="<?= htmlspecialchars($place['city']) ?>" required>
		<input type="number" name="positionx" value="<?= htmlspecialchars($place['positionx']) ?>" required>
		<input type="number" name="positiony" value="<?= htmlspecialchars($place['positiony']) ?>" required>
		<input type="text" name="region" value="<?= htmlspecialchars($place['region']) ?>" required>
		<input type="text" name="website" value="<?= htmlspecialchars($place['website']) ?>">
		<input type="tel" name="tel" value="<?= htmlspecialchars($place['tel']) ?>" required>
		<input type="email" name="mail" value="<?= htmlspecialchars($place['mail']) ?>" required>
	    <textarea name="presentation" value="<?= htmlspecialchars($place['presentation']) ?>" required></textarea><br />
	    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour le lieu de réception">
	</form>
	<button class="btn btn-primary"><a href="index.php">Annuler</a></button>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
