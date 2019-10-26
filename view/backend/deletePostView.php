<?php ob_start(); ?>
    <img class="fullwidth" src="public/img/episode<?= $post['id'] ?>.jpg" alt="image alaska épisode">
<?php $image_post = ob_get_clean(); ?>

<?php $page_title = "Page d'administration du site de Jean Forteroche" ?>

<?php $page_subtitle = "Supprimer l'épisode : " . $post['title'] ?>

<?php $main_content_title = "Vous êtes sur le point de supprimer définitivement cet épisode ainsi que ses commentaires"; ?>

<?php $creation_post = "" ?>

<?php ob_start(); ?>
        <button class="boutonVert"><a href="index.php?action=delete&amp;id=<?= $post['id'] ?>">Supprimer l'épisode</a></button>
        <button class="boutonRouge"><a href="index.php">Annuler</a></button>
<?php $main_content_subtitle = ob_get_clean(); ?>

<?php $article_content = $post['content']?>

<?php ob_start(); ?>
<?php
while ($comment = $comments->fetch())
    {
    ?>
    <div id="comment">
        <p><strong><?= htmlspecialchars($comment['author']) ?></strong></p>
        <p><?= htmlspecialchars($comment['comment']) ?></p>
        <p></strong> le <?= $comment['comment_date_fr'] ?></strong></p>
    </div>
    <?php
    }
    ?>
<?php $comment_content = ob_get_clean(); ?>

<?php require('templateBackend.php'); ?>
