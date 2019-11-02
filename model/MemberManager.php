<?php
//On charge Manager.php (pour récupérer la connexion à la bdd)
require_once('model/Manager.php');

class MemberManager extends Manager
{
	public function subscribeMember($pseudo, $pass, $email)
	{
		$pass = password_hash($_POST['passSubscriber'], PASSWORD_DEFAULT);
		//Sinon on se connecte à la bdd
		$db = $this->dbConnect();
		$db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING );
		//On récupère l'id et le mdp lié au pseudo renseigné
		$req = $db->prepare("INSERT INTO members(pseudo, pass, email, subscription_date, member_type) VALUES (?, ?, ?, NOW(), 'user')");
		$resultat = $req->execute(array($pseudo, $pass, $email));
		var_dump($db->errorInfo());
		if (! $resultat){
			throw new Exception('Impossible de créer le nouveau membre');
		}
	}

	public function accessMember($pseudo, $pass)
	{
		//Si déjà connecté on termine la fonction ici
		if(isset($_SESSION['id'])){
			return;
		}
		//Sinon on se connecte à la bdd
		$db = $this->dbConnect();
		$pseudo = $_POST['pseudoMember'];
		//On récupère l'id et le mdp lié au pseudo renseigné
		$req = $db->prepare('SELECT id, pass, member_type FROM members WHERE pseudo = ?');
		$req->execute(array($pseudo));
		//on stocke le résultat de la requête dans l'array résultat
		$resultat = $req->fetch();
		//On vérifie que le mot de passe renseigné par rapport à celui stocké dans la bdd (qui a été haché préalablement) avec la fonction password_verify
		//Si le pseudo renseigné n'est pas trouvé dans la bdd...
		if (!$resultat)
		{
   			throw new Exception('Mauvais identifiant ou mot de passe !');
		}
		$isPasswordCorrect = password_verify($_POST['passMember'], $resultat['pass']);
		//Si le pseudo est trouvé et que le mdp renseigné est correct, on connecte l'admin
    	if ($isPasswordCorrect) {
			if($resultat['member_type'] == "admin"){
			$_SESSION['member_type'] = "admin";
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $pseudo;
			}
			elseif ($resultat['member_type'] == "user"){
				$_SESSION['member_type'] = "user";
				$_SESSION['id'] = $resultat['id'];
				$_SESSION['pseudo'] = $pseudo;	
			}
    	}
    	//Si mauvais mdp ...
    	else {
        throw new Exception('Mauvais identifiant ou mot de passe !');
    	}	
	}

	public function createMemberPage($userTypeId)
	{
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title FROM usertype WHERE id = ?');
	    $req->execute(array($userTypeId));
	    $pageType = $req->fetch();
		return $pageType;
	}

		public function createPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
		{
			$db = $this->dbConnect();
			$posts = $db->prepare('INSERT INTO places(title, city, positionx, positiony, region, website, tel, presentation, creation_date, author_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), ?)');
			$postCreated = $posts->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $presentation, $authorId));
			
			return $db->lastInsertId();
		}
	
		public function createWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
		{
			$db = $this->dbConnect();
			$posts = $db->prepare('INSERT INTO weddingplanners(pseudo, specialty, presentation, website, tel, mail, author_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
			$postCreated = $posts->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId));
			
			return $db->lastInsertId();
		}
		
		public function createHelperMember($pseudo, $presentation, $website, $tel, $mail, $id_type, $authorId)
		{
			$db = $this->dbConnect();
			$posts = $db->prepare('INSERT INTO helpers(pseudo, specialty, presentation, website, tel, mail, id_type, author_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?)');
			$postCreated = $posts->execute(array($pseudo, $presentation, $website, $tel, $mail, $id_type, $authorId));
			
			return $db->lastInsertId();
		}
			
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

		public function modifyPlace($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$places = $db->prepare('UPDATE places SET title = ?, city = ?, positionx = ?, positiony = ?, region = ?, website = ?, tel = ?, presentation = ? WHERE id = ?');
					$updatedPlace = $places->execute(array($placeId, $title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation));
					return $updatedPlace;
			}
		}
		
		public function modifyWeddingplanner($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$places = $db->prepare('UPDATE weddingplanners SET pseudo = ?, specialty = ?, presentation = ?, website = ?, tel = ?, mail = ? WHERE id = ?');
					$updatedWeddingplanner = $places->execute(array($weddingplannerId, $pseudo, $specialty, $presentation, $website, $tel, $mail));
					return $updatedWeddingplanner;
			}
		}
		
		public function modifyHelper($helperId, $pseudo, $id_type, $content, $website, $tel, $mail)
		{
			if(isset($_POST['submit'])){
					$db = $this->dbConnect();  
					$places = $db->prepare('UPDATE helpers SET pseudo = ?, id_type = ?, content = ?, website = ?, tel = ?, mail = ? WHERE id = ?');
					$updatedPlace = $places->execute(array($helperId, $pseudo, $id_type, $content, $website, $tel, $mail));
					return $updatedHelper;
			}
		}
		public function placeImageMember($placeId)
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
		
		public function weddingplannerImageMember($weddingplannerId)
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
		
		public function helperImageMember($helperId)
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