<?php $image_page = ""; ?>

<?php $page_title = "Bienvenue sur votre profil"; ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter votre offre de prestation sur le site Mariage & Coquillages"; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
	<h2>Ajouter votre offre de services sur le site</h2>
    <form action="index.php?action=creationMemberPage&amp;userTypeId=<?= $userType['id'] ?>" method="post" enctype="multipart/form-data">
		<label for="user_type"><strong>Prestation proposée</strong></label><br />
		<select name="user-type">
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Fleuriste</option>
			<option value="2">Lieu de réception</option>
			<option value="3">Loueur de voitures et motos</option>
			<option value="4">Patiserie</option>
			<option value="5">Photographe</option>
			<option value="6">Traiteur</option>
			<option value="7">Vendeur et loueur de costumes de marié</option>
			<option value="8">Vendeur et loueur de robes de mariée</option>
			<option value="9">Wedding-Planner</option>
		</select>
	    <button class="boutonRouge"><a href="index.php">Annuler</a></button>
	</form>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateUser.php'); ?>