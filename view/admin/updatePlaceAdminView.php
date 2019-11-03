<?php $image_page = ""; ?>

<?php $page_title = "Mise à jour du lieu de réception"; ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point de modifier le lieu de réception "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=updatePlaceAdmin&amp;placeId=<?= $place['id'] ?>" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input type="file" name="image" /><br /><br />
		<input type="text" name="title" value="<?= $place['title'] ?>" required>
		<input type="text" name="city"  value="<?= $place['city'] ?>" required>
		<input type="text" name="positionx" value="<?= $place['positionx'] ?>" required>
		<input type="text" name="positiony" value="<?= $place['positiony'] ?>" required>
		<input type="text" name="region" value="<?= $place['region'] ?>" required>
		<input type="text" name="website" value="<?= $place['website'] ?>">
		<input type="text" name="tel" value="<?= $place['tel'] ?>" required>
		<input type="email" name="mail" value="<?= $place['mail'] ?>" required>
	    <textarea name="presentation" value="<?= $place['presentation'] ?>" required></textarea><br />
	    <input type="submit" name="submit" value="Mettre à jour le lieu de réception">
	</form>
	<button><a href="index.php">Annuler</a></button>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
