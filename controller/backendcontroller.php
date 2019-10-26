<?php
//On charge Manager.php (pour récupérer la connexion à la bdd)
require_once('model/Manager.php');

class AdminManager extends Manager
{
//Suppression d'un épisode
  	public function deletePlace($placeId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM places WHERE id = ?');
	        $req->execute(array($placeId));
	        $deletePlace = $req->fetch(); 
	}
	//Suppression des commentaires
  	public function deleteComments($postId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM comments WHERE post_id = ?');
	        $req->execute(array($postId));
	        $deleteComments = $req->fetch(); 
	}
	//Suppression d'un commentaire
	public function deleteComment($commentId, $postId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM comments WHERE id = ? AND post_id = ?');
	        $req->execute(array($commentId, $postId));
	        $deleteComment = $req->fetch(); 
	}
	//Modification d'un épisode existant
	public function modifyPost($title, $content, $postId)
	{
		if(isset($_POST['submit'])){
		        $db = $this->dbConnect();  
		        $posts = $db->prepare('UPDATE posts SET title = ?, content = ?, updated_date = NOW() WHERE id = ?');
		        $updatedPost = $posts->execute(array($title, $content, $postId));
		        return $updatedPost;
		}
	}
	//Création d'un nouvel épisode
	public function createPost($title, $content)
	{
	    $db = $this->dbConnect();
	    $posts = $db->prepare('INSERT INTO posts(title, creation_date, content) VALUES(?, NOW(), ?)');
	    $postCreated = $posts->execute(array($title, $content));
	    
	    return $db->lastInsertId();
	}
	//Upload d'une nouvelle image pour un épisode (création ou modification d'un épisode)
	public function postImage($postId)
	{
	    //Si un fichier a été transmis
	    if (isset($_FILES['image'])){
	    	//Si le fichier ne pèse pas plus de 5 Mo
	    	if ($_FILES['image']['size'] <= 5000000){
	    		//On récupère le nom du fichier
	    		$infosfichier = pathinfo($_FILES['image']['name']);
                //On récupère l'extension du fichier
                $extension_upload = $infosfichier['extension'];
                //On crée un array des extensions permises
                $extensions_autorisees = array('jpg', 'jpeg', 'gif', 'png');
                //On compare l'extension du fichier transmis aux types d'extension autorisés
                if (in_array($extension_upload, $extensions_autorisees)){
                	//On place l'image dans le dossier adéquat et on lui donne un nouveau nom pour faciliter sa récupération
                	move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/episode' . $postId . "." . $extension_upload);
                }
	    	}
		}
    }
}