<?php $linkrel = ""; ?>

<?php $image_page = ""; ?>

<?php $page_title = "Page d'ajout d'un nouveau lieu de réception"; ?>

<?php $page_subtitle = "Ajouter un nouveau lieu de réception"; ?>

<?php ob_start(); ?>
<section class="create-form">
<form class="form creationForm" action="index.php?action=createPlaceMember&amp;authorId=<?= $_SESSION['id'] ?>" method="post" enctype="multipart/form-data">
	<div class="form-group">	
		<label for="image"><strong>Définir l'image d'illustration</strong></label><br />
		<input class="boutonVert" type="file" name="image" /><br /><br />
	</div>
	<div class="form-group">
	<label for="title"><strong>Nom du lieu de réception</strong></label><br />
	<input type="text" name="title" placeholder="Nom du lieu de réception" required>
	</div>
	<div class="form-group">
	<label for="city"><strong>Ville</strong></label><br />
	<input type="text" name="city" placeholder="Ville du lieu de réception" required>
	</div>
	<div class="form-group">
	<label for="positionx"><strong>positionx</strong></label><br />
	<input type="text" name="positionx" placeholder="positionx">
	</div>
	<div class="form-group">
	<label for="positiony"><strong>positiony</strong></label><br />
	<input type="text" name="positiony" placeholder="positiony">
	</div>
	<div class="form-group">
	<label for="region"><strong>Région</strong></label><br />
	<input type="text" name="region" placeholder="region">
	</div>
	<div class="form-group">
	<label for="website"><strong>Site Web</strong></label><br />
	<input type="text" name="website" placeholder="Url de votre site Web">
	</div>
	<div class="form-group">
	<label for="tel"><strong>Téléphone</strong></label><br />
	<input class="phoneNumber" type="text" name="tel" placeholder="0123456789" required>
	</div>
	<div class="form-group">		
	<label for="mail"><strong>Email</strong></label><br />
	<input type="email" name="mail" placeholder="Votre email" required>		
	</div>	
	<div class="form-group">
	<label for="presentation"><strong>Présentation du lieu de réception</strong></label><br />
	<textarea rows="10" cols="100" name="presentation" placeholder="Description du lieu de réception" required></textarea>
	</div>
    <input class="btn btn-primary"" type="submit" name="submit" value="Publier le prestataire">
</form>
<button class="btn btn-primary cancel-create"><a href="index.php">Annuler</a></button>
</section>
=
<?php $main_content = ob_get_clean(); ?>

<?php ob_start(); ?>
<script src="public/js/formPhoneNumberVerify.js"></script>
<?php $script = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>
