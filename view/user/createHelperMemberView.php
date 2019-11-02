<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'un nouveau prestataire"; ?>

<?php $page_subtitle = "Ajouter un nouveau prestataire"; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter un nouveau prestataire "; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
    <form action="index.php?action=createHelperMember&amp;authorId=<?= $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
	    <label for="image"><strong>Définir l'image d'illustration</strong></label><br />
   		<input class="boutonVert" type="file" name="image" /><br /><br />
		<input type="text" name="pseudo" placeholder="Nom de votre entreprise" required>
		<label for="helper-type"><strong>Type de prestation proposée</strong></label><br />
		<select name="helper-type" required>
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Photographe</option>
			<option value="2">Fleuriste</option>
			<option value="3">Loueur de voitures et motos</option>
			<option value="4">Vendeur et loueur de robes de mariée</option>
			<option value="5">Vendeur et loueur de costumes de marié</option>
			<option value="6">Traiteur</option>
			<option value="7">Pattiserie</option>
		</select>
	    <textarea name="presentation" placeholder="Description de vos services" required></textarea><br />
		<input type="text" name="website" placeholder="Url de votre site Web">
		<input type="text" name="tel" placeholder="Votre n° de téléphone" required>		
		<input type="email" name="email" placeholder="Votre email" required>		
	    <input class="boutonVert" type="submit" name="submit" value="Publier le prestataire">
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateUser.php'); ?>
