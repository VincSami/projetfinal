<?php
//On charge Manager.php (pour récupérer la connexion à la bdd)
require_once('model/Manager.php');

class AdminManager extends Manager
{
	public function connectAdmin($pseudo, $password)
	{
		//Si l'admin est déjà connecté on termine la fonction ici
		if(isset($_SESSION['id'])){
			return;
		}
		//Sinon on se connecte à la bdd
		$db = $this->dbConnect();
		$pseudo = $_POST['pseudo'];
		//On récupère l'id et le mdp lié au pseudo renseigné
		$req = $db->prepare('SELECT id, password FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		//on stocke le résultat de la requête dans l'array résultat
		$resultat = $req->fetch();
		//On vérifie que le mot de passe renseigné par rapport à celui stocké dans la bdd (qui a été haché préalablement) avec la fonction password_verify
		$isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);
		//Si le pseudo renseigné n'est pas trouvé dans la bdd...
		if (!$resultat)
		{
   			throw new Exception('Mauvais identifiant ou mot de passe !');
		}
		//Si le pseudo est trouvé et que le mdp renseigné est correct, on connecte l'admin
    	if ($isPasswordCorrect) {
	        $_SESSION['id'] = $resultat['id'];
	        $_SESSION['pseudo'] = $pseudo;
    	}
    	//Si mauvais mdp ...
    	else {
        throw new Exception('Mauvais identifiant ou mot de passe !');
    	}	
	}

	//Suppression d'un épisode
  	public function deletePlace($placeId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM places WHERE id = ?');
	        $req->execute(array($placeId));
	        $deletePlace = $req->fetch(); 
    }
    
    public function deleteWeddingplanner($weddingplannerId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM weddingplanners WHERE id = ?');
	        $req->execute(array($weddingplannerId));
	        $deleteWeddingplanner = $req->fetch(); 
	}

	public function deleteHelper($helperId)
	{
	        $db = $this->dbConnect();  
	        $req = $db->prepare('DELETE FROM helpers WHERE id = ?');
	        $req->execute(array($helperId));
	        $deletehelper = $req->fetch(); 
	}

	//Modification d'un épisode existant
	public function modifyPlace($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
	{
		if(isset($_POST['submit'])){
		        $db = $this->dbConnect();  
		        $places = $db->prepare('UPDATE places SET title = ?, city = ?, positionx = ?, positiony = ?, region = ?, website = ?, tel = ?, presentation = ? WHERE id = ?');
		        $updatedPlace = $places->execute(array($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation));
		        return $updatedPlace;
		}
	}
	
	//Modification d'un épisode existant
	public function modifyWeddingplanner($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail)
	{
		if(isset($_POST['submit'])){
		        $db = $this->dbConnect();  
		        $places = $db->prepare('UPDATE weddingplanners SET pseudo = ?, specialty = ?, presentation = ?, website = ?, tel = ?, mail = ? WHERE id = ?');
		        $updatedWeddingplanner = $places->execute(array($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail));
		        return $updatedWeddingplanner;
		}
	}
	
	//Modification d'un épisode existant
	public function modifyHelper($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type)
	{
		if(isset($_POST['submit'])){
		        $db = $this->dbConnect();  
		        $places = $db->prepare('UPDATE helpers SET pseudo = ?, presentation = ?, website = ?, tel = ?, mail = ?, id_type WHERE id = ?');
		        $updatedPlace = $places->execute(array($helperId, $pseudo, $presentation, $website, $tel, $mail, $id_type));
		        return $updatedHelper;
		}
	}

	//Création d'un nouvel épisode
	public function createPlace($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
	{
	    $db = $this->dbConnect();
	    $posts = $db->prepare('INSERT INTO places(title, city, positionx, positiony, region, website, tel, presentation, creation_date) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW())');
	    $postCreated = $posts->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $presentation));
	    
	    return $db->lastInsertId();
	}

	//Création d'un nouvel épisode
	public function createWeddingplanner($pseudo, $specialty, $presentation, $website, $tel, $mail)
	{
	    $db = $this->dbConnect();
	    $posts = $db->prepare('INSERT INTO weddingplanners(pseudo, specialty, presentation, website, tel, mail) VALUES(?, ?, ?, ?, ?, ?)');
	    $postCreated = $posts->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail));
	    
	    return $db->lastInsertId();
	}
	
	//Création d'un nouvel épisode
	public function createHelper($pseudo, $presentation, $website, $tel, $mail, $id_type)
	{
	    $db = $this->dbConnect();
	    $posts = $db->prepare('INSERT INTO helpers(pseudo, specialty, presentation, website, tel, mail, id_type) VALUES(?, ?, ?, ?, ?, ?, ?)');
	    $postCreated = $posts->execute(array($pseudo, $presentation, $website, $tel, $mail, $id_type));
	    
	    return $db->lastInsertId();
	}
		
	public function placeImage($placeId)
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
                	move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/place' . $placeId . "." . $extension_upload);
                }
	    	}
		}
	}
	
	public function weddingplannerImage($weddingplannerId)
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
                	move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/weddingPlanner' . $weddingplannerId . "." . $extension_upload);
                }
	    	}
		}
	}
	
	public function helperImage($helperId)
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
                	move_uploaded_file($_FILES['image']['tmp_name'], 'public/img/helper' . $helperId . "." . $extension_upload);
                }
	    	}
		}
    }
}