<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Mise à jour du prestataire"; ?>

<?php $page_subtitle = ""; ?>

<?php ob_start(); ?>
<section class="update-form">
    <form class="form" action="index.php?action=updateHelperAdmin&amp;helperId=<?= $helper['id'] ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
		<input type="file" name="image" /><br /><br />
	</div>
	<div class="form-group">
		<label for="pseudo"><strong>Nom de l'entreprise</strong></label><br />
		<input type="text" name="pseudo" value="<?= htmlspecialchars($helper['pseudo']) ?>" required>
	</div>
	<div class="form-group">
		<label for="content"><strong>Présentation de l'entreprise</strong></label><br />
		<textarea rows="10" cols="100" name="content" placeholder="Description de vos services" required><?= htmlspecialchars($helper['content']) ?></textarea><br />
	</div>
	<div class="form-group">
		<label for="website"><strong>Site Web</strong></label><br />
		<input type="text" name="website" value="<?= htmlspecialchars($helper['website']) ?>">
	</div>
	<div class="form-group">
		<label for="tel"><strong>Téléphone</strong></label><br />
		<input type="text" name="tel" value="<?= htmlspecialchars($helper['tel']) ?>" required>
	</div>
	<div class="form-group">		
		<label for="mail"><strong>Email</strong></label><br />
		<input type="email" name="mail" value="<?= htmlspecialchars($helper['mail']) ?>" required>		
	</div>
	<div class="form-group">
		<label for="helperType"><strong>Type de prestation proposée</strong></label><br />
		<select name="helperType" required>
			<option value="1">Photographe</option>
			<option value="2">Fleuriste</option>
			<option value="3">Loueur de voitures et motos</option>
			<option value="4">Vendeur et loueur de robes de mariée</option>
			<option value="5">Vendeur et loueur de costumes de marié</option>
			<option value="6">Traiteur</option>
			<option value="7">Pâtisserie</option>
		</select>
	</div>					
	<input class="btn btn-primary" type="submit" name="submit" value="Mettre à jour le prestataire">
	</form>
	<button class="btn btn-primary cancel-update"><a href="index.php">Annuler</a></button>
</section>
<?php $main_content = ob_get_clean(); ?>

<?php $script = ""; ?>

<?php require('templateBackend.php'); ?>