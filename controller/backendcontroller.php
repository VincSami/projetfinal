<?php

require_once('model/PlaceManager.php');
require_once('model/CommentsManager.php');
require_once('model/AdminManager.php');
require_once('model/WeddingplannerManager.php');
require_once('model/HelperManager.php');

//Accueil Administrateur
function homeAdmin()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/indexAdminView.php');
}

//Lecture billet Administrateur
function postAdmin()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();  

    $adminManager = new AdminManager();
    $commentsManager = new CommentsManager();

    $post = $adminManager->getPostAdmin($_GET['id']);
    $comments = $commentsManager->getComments($_GET['id']);
    require('view/backend/postAdminView.php');
}

//Page de suppression du billet et des commentaires
function deletePostAdmin()
{ 
    $postManager = new PostManager();
    $commentsManager = new CommentsManager();

    $posts = $postManager->getPosts();  
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentsManager->getComments($_GET['id']);
    require('view/backend/deletePostView.php');
}

//Suppression du billet et des commentaires
function erasePost($postId)
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
  $adminManager = new AdminManager();
    $deletePost = $adminManager->deletePost($postId);
    $deleteComments = $adminManager->deleteComments($postId);
    header('Location:index.php');
}

//Suppression d'un commentaire
function eraseComment($commentId, $postId){
    $adminManager = new AdminManager();
    $eraseComment = $adminManager->deleteComment($commentId, $postId);
    header('Location: index.php?action=postAdmin&id=' . $postId);
}

//Page de modification du billet
function updatePostAdmin()
{
    $postManager = new PostManager();
    $commentsManager = new CommentsManager();
  
    $posts = $postManager->getPosts();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentsManager->getComments($_GET['id']);
    require('view/backend/updatePostView.php');
}

//Modification du billet
function updatePost($title, $content, $postId)
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    
    $adminManager = new AdminManager();
    $updatedPost = $adminManager->modifyPost($title, $content, $postId);
    $postImage = $adminManager->postImage($postId);
    if ($updatedPost === false) {
        throw new Exception('Impossible de modifier le billet !');
    } 
    else {
        header('Location: index.php?action=postAdmin&id=' . $postId);
    }
}

function postCreation()
{
  $postManager = new PostManager();
  $posts = $postManager->getPosts();
  require('view/backend/createPostView.php');
}

//Création d'un nouveau billet
function newPost($title, $content)
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();  
    
    $adminManager = new AdminManager();
    $postCreated = $adminManager->createPost($title, $content);
    $postImage = $adminManager->postImage($postCreated);
    if ($postCreated === false) {
        throw new Exception('Impossible d\'ajouter le billet !');
    } 
    else {
        header('Location: index.php');
    }
}