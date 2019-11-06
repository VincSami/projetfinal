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
		public function createPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
		{
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO places(title, city, positionx, positiony, region, website, tel, mail, presentation, creation_date, ranked, author_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NULL, ?)');
			$placeCreated = $req->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId));
			
			return $db->lastInsertId();
		}
	
		public function createWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
		{
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO weddingplanners(pseudo, specialty, presentation, website, tel, mail, author_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
			$weddingplannerCreated = $req->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId));
			
			return $db->lastInsertId();
		}
		
		public function createHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $authorId)
		{
			$db = $this->dbConnect();
			$req = $db->prepare('INSERT INTO helpers(pseudo, content, website, tel, mail, id_type, author_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
			$helperCreated = $req->execute(array($pseudo, $content, $website, $tel, $mail, $helperType, $authorId));
			
			return $db->lastInsertId();
		}
			
		public function modifyPlaceAdmin($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$req = $db->prepare('UPDATE places SET title = ?, city = ?, positionx = ?, positiony = ?, region = ?, website = ?, tel = ?, mail = ?, presentation = ? WHERE id = ?');
					$updatedPlace = $req->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId));
					return $updatedPlace;
			}
		}
		
		public function modifyWeddingplannerAdmin($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$req = $db->prepare('UPDATE weddingplanners SET pseudo = ?, specialty = ?, presentation = ?, website = ?, tel = ?, mail = ? WHERE id = ?');
					$updatedWeddingplanner = $req->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId));
					return $updatedWeddingplanner;
			}
		}
		
		public function modifyHelperAdmin($pseudo, $content, $website, $tel, $mail, $helperType, $helperId)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$req = $db->prepare('UPDATE helpers SET pseudo = ?, content = ?, website = ?, tel = ?, mail = ?, id_type = ? WHERE id = ?');
					$updatedHelper = $req->execute(array($pseudo, $content, $website, $tel, $mail, $helperType, $helperId));
					return $updatedHelper;
			}
		}
		public function placeImageAdmin($placeId)
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
		
		public function weddingplannerImageAdmin($weddingplannerId)
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
		
		public function helperImageAdmin($helperId)
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