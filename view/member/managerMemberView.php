<?php $image_page = ""; ?>

<?php $page_title = "Bienvenue sur votre profil" ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter votre offre de prestation sur le site Mariage & Coquillages"; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<section id="newMemberPage">
	<button id="addServicesButton">J'ajoute mes services</button>
    <form id="addServicesForm" action="index.php?action=creationMemberPage" method="post" enctype="multipart/form-data">
		<label for="memberType"><strong>Sélectionner le type de prestation proposée</strong></label><br />
		<select name="memberType">
			<option value="">--Merci de choisir une option--</option>
			<option value="1">Lieu de réception</option>
            <option value="2">Wedding-Planner</option>
			<option value="3">Autres prestataires</option>
		</select>
		<input type="submit" name="submit" value="Valider">
	</form>
	<button id="cancelAddServicesButton">Annuler</button>
</section>
<div id="memberProfil">
<h3>Vos offres de service publiées</h3>
<section id="memberPlaces">
<?php
if ($memberPlaces){
foreach($memberPlaces as $memberPlace)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/place<?= $memberPlace['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
        <h5 class="card-title"><?= $memberPlace['title'] ?><br></h5>
        <a href="index.php?action=deletePlacePageMember&amp;id=<?= $memberPlace['id'] ?>" class="btn btn-primary">Supprimer</a>
        <a href="index.php?action=updatePlacePageMember&amp;id=<?= $memberPlace['id'] ?>" class="btn btn-primary">Modifier</a>
    </div>
</div>
<?php
}
}
?>
</section>
<section id="memberweddingPlanners">
<?php
if ($memberWeddingplanners){
foreach($memberWeddingplanners as $memberWeddingplanner)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/weddingPlanner<?= $memberWeddingplanner['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
        <h5 class="card-title"><?= $memberWeddingplanner['pseudo'] ?><br></h5>
        <a href="index.php?action=deleteWeddingplannerPageMember&amp;id=<?= $memberWeddingplanner['id'] ?>" class="btn btn-primary">Supprimer</a>
        <a href="index.php?action=updateWeddingplannerPageMember&amp;id=<?= $memberWeddingplanner['id'] ?>" class="btn btn-primary">Modifier</a>
    </div>
</div>
<?php
}
}
?>
</section>
<section id="memberHelpers">
<?php
if ($memberHelpers){
foreach($memberHelpers as $memberHelper)
{
?>
<div class="card" style="width: 18rem;">
    <img src="public/img/helper<?= $memberHelper['id'] ?>.jpg" class="card-img-top" alt="image lieu de réception">
    <div class="card-body">
        <h5 class="card-title"><?= $memberHelper['pseudo'] ?><br></h5>
        <a href="index.php?action=deleteHelperPageMember&amp;id=<?= $memberHelper['id'] ?>" class="btn btn-primary">Supprimer</a>
        <a href="index.php?action=updateHelperPageMember&amp;id=<?= $memberHelper['id'] ?>" class="btn btn-primary">Modifier</a>
    </div>
</div>
<?php
}
}
?>
</section>
</div>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>