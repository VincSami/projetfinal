<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'un nouveau prestataire"; ?>

<?php $page_subtitle = "Ajouter un nouveau prestataire"; ?>

<?php ob_start(); ?>
    <form action="index.php?action=updateHelperMember&amp;helperId=<?= $helper['id'] ?>" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="pseudo" value="<?= $helper['pseudo'] ?>" required>
	    <textarea name="content" required><?= $helper['content'] ?></textarea><br />
		<input type="text" name="website" value="<?= $helper['website'] ?>">
		<input type="text" name="tel" value="<?= $helper['tel'] ?>" required>		
		<input type="email" name="mail" value="<?= $helper['mail'] ?>" required>
		<label for="helperType"><strong>Type de prestation proposée</strong></label><br />
		<select name="helperType" required>
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Photographe</option>
			<option value="2">Fleuriste</option>
			<option value="3">Loueur de voitures et motos</option>
			<option value="4">Vendeur et loueur de robes de mariée</option>
			<option value="5">Vendeur et loueur de costumes de marié</option>
			<option value="6">Traiteur</option>
			<option value="7">Pattiserie</option>
		</select>		
	    <input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour le prestataire">
	</form>
	<button class="btn btn-primary"><a href="index.php">Annuler</a></button>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
