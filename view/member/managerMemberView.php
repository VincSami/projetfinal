<?php $image_page = ""; ?>

<?php $page_title = "Bienvenue sur votre profil"; ?>

<?php $page_subtitle = ""; ?>

<?php $main_content_title = "Vous êtes sur le point d'ajouter votre offre de prestation sur le site Mariage & Coquillages"; ?>

<?php $main_content_subtitle = ""; ?>

<?php ob_start(); ?>
<section id="newMemberPage">
	<button>J'ajoute mes services</button>
    <form action="index.php?action=creationMemberPage" method="post" enctype="multipart/form-data">
		<label for="memberType"><strong>Sélectionner le type de prestation proposée</strong></label><br />
		<select name="memberType">
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
		<input type="submit" name="submit" value="Valider">
	</form>
	<button class="boutonRouge"><a href="index.php">Annuler</a></button>
</section>
<div id="memberProfil">
<h3>Vos offres de service publiées</h3>
<section id="memberPlaces">
	<article>
        <ul>
        <?php
		if ($memberPlaces){
        foreach($memberPlaces as $memberPlace)
        {
        ?>
        <li>
            <figure>
                <a href="index.php?action=placeMember&amp;id=<?= $memberPlace['id'] ?>">
                	<img src="public/img/place<?= $memberPlace['id'] ?>.jpg">
                </a>
                <figcaption>
                	<?= $memberPlace['title'] ?><br>
                    <button class="boutonRouge" id="deletePlacePageMember"><a href="index.php?action=deletePlacePageMember&amp;id=<?= $memberPlace['id'] ?>">Supprimer</a></button>
                    <button class="boutonOrange" id="updatePlacePageMember"><a href="index.php?action=updatePlacePageMember&amp;id=<?= $memberPlace['id'] ?>">Modifier</a></button>
                </figcaption>
            </figure>
        </li>
        <?php
		}
		}
        ?>
        </ul>
    </article>
</section>
<section id="memberweddingPlanners">
    <article>
        <ul>
        <?php
		if ($memberWeddingplanners){
        foreach($memberWeddingplanners as $memberWeddingplanner)
        {
        ?>
        <li>
            <figure>
                <a href="index.php?action=weddingplannerMember&amp;id=<?= $memberWeddingplanner['id'] ?>">
                    <img src="public/img/weddingPlanner<?= $memberWeddingplanner['id'] ?>.jpg">
                </a>
                <figcaption>
                	<?= $memberWeddingplanner['pseudo'] ?><br>
                    <button class="boutonRouge" id="deleteWeddingplannerPageMember"><a href="index.php?action=deleteWeddingplannerPageMember&amp;id=<?= $memberWeddingplanner['id'] ?>">Supprimer</a></button>
                    <button class="boutonOrange" id="updateWeddingplannerPageMember"><a href="index.php?action=updateWeddingplannerPageMember&amp;id=<?= $memberWeddingplanner['id'] ?>">Modifier</a></button>
                </figcaption>
            </figure>
        </li>
        <?php
		}
		}
        ?>
        </ul>
    </article>
</section>
<section id="memberHelpers">
    <article>
        <ul>
        <?php
		if ($memberHelpers){
        foreach($memberHelpers as $memberHelper)
		{
        ?>
        <li>
            <figure>
                <a href="index.php?action=memberHelper&amp;id=<?= $memberHelper['id'] ?>">
                	<img src="public/img/helper<?= $memberHelper['id'] ?>.jpg">
                </a>
                <figcaption>
                	<?= $memberHelper['pseudo'] ?><br>
                    <button class="boutonRouge" id="deleteHelperPageMember"><a href="index.php?action=deleteHelperPageMember&amp;id=<?= $memberHelper['id'] ?>">Supprimer</a></button>
                    <button class="boutonOrange" id="updateHelperPageMember"><a href="index.php?action=updateHelperPageMember&amp;id=<?= $memberHelper['id'] ?>">Modifier</a></button>
                </figcaption>
            </figure>
        </li>
        <?php
		}
		}
        ?>
        </ul>
    </article>
</section>
</div>
<?php $main_content = ob_get_clean(); ?>

<?php require('templateMember.php'); ?>