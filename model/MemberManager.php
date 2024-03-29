<?php

namespace VS\MariageCoquillages\Model;

//On charge Manager.php (pour récupérer la connexion à la bdd)
require_once('model/Manager.php');

class MemberManager extends Manager
{
	//inscritpion d'un nouveau membre
	public function subscribeMember($pseudo, $pass, $email)
	{
		//hashage du mot de passe entré par l'utilisateur pour plus de sécurité
		$pass = password_hash($_POST['passSubscriber'], PASSWORD_DEFAULT);
		//connexion à la bdd
		$db = $this->dbConnect();
		//on insère les informations du nouveau membre dans la table 
		$req = $db->prepare("INSERT INTO members(pseudo, pass, email, subscription_date, member_type) VALUES (?, ?, ?, NOW(), 'user')");
		$resultat = $req->execute(array($pseudo, $pass, $email));
		//on vérifie que l'insertion a bien été réalisé
		if (! $resultat){
			throw new \Exception('Impossible de créer le nouveau membre');
		}
		//on attribue des informations de session au nouveau membre pour lui permettre de se connecter directement
      	$_SESSION['member_type'] = "user";
		$_SESSION['id'] = $db->lastInsertId();
		$_SESSION['pseudo'] = $pseudo;
	}
	//connexion d'un membre existant
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
   			throw new \Exception('Mauvais identifiant ou mot de passe !');
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
        throw new \Exception('Mauvais identifiant ou mot de passe !');
    	}	
	}
	//création d'un nouveau prestataire
	public function createMemberPage($userTypeId)
	{
		$db = $this->dbConnect();
	    $req = $db->prepare('SELECT id, title FROM usertype WHERE id = ?');
	    $req->execute(array($userTypeId));
	    $pageType = $req->fetch();
		return $pageType;
	}
	//création lieu de réception
	public function createPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO places(title, city, positionx, positiony, region, website, tel, mail, presentation, creation_date, ranked, author_id) VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?, NOW(), NULL, ?)');
		$placeCreated = $req->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $authorId));

		return $db->lastInsertId();
	}
	//création wedding-planner
  	public function createWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO weddingplanners(pseudo, specialty, presentation, website, tel, mail, popular, author_id) VALUES(?, ?, ?, ?, ?, ?, 0, ?)');
		$weddingplannerCreated = $req->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail, $authorId));

		return $db->lastInsertId();
	}
	//création prestataire
	public function createHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $authorId)
	{
		$db = $this->dbConnect();
		$req = $db->prepare('INSERT INTO helpers(pseudo, content, website, tel, mail, id_type, author_id) VALUES(?, ?, ?, ?, ?, ?, ?)');
		$helperCreated = $req->execute(array($pseudo, $content, $website, $tel, $mail, $helperType, $authorId));
		
		return $db->lastInsertId();
	}
	//suppression
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
  //mise à jour
	public function modifyPlaceMember($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId)
	{
		if(isset($_POST['submit'])){
				$db = $this->dbConnect();  
				$req = $db->prepare('UPDATE places SET title = ?, city = ?, positionx = ?, positiony = ?, region = ?, website = ?, tel = ?, mail = ?, presentation = ? WHERE id = ?');
				$updatedPlace = $req->execute(array($title, $city, $positionx, $positiony, $region, $website, $tel, $mail, $presentation, $placeId));
				return $updatedPlace;
		}
	}
	
	public function modifyWeddingplannerMember($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId)
	{
		if(isset($_POST['submit'])){
				$db = $this->dbConnect();  
				$req = $db->prepare('UPDATE weddingplanners SET pseudo = ?, specialty = ?, presentation = ?, website = ?, tel = ?, mail = ? WHERE id = ?');
				$updatedWeddingplanner = $req->execute(array($pseudo, $specialty, $presentation, $website, $tel, $mail, $weddingplannerId));
				return $updatedWeddingplanner;
		}
	}
	
	public function modifyHelperMember($pseudo, $content, $website, $tel, $mail, $helperType, $helperId)
	{
		if(isset($_POST['submit'])){
				$db = $this->dbConnect();  
				$req = $db->prepare('UPDATE helpers SET pseudo = ?, content = ?, website = ?, tel = ?, mail = ?, id_type = ? WHERE id = ?');
				$updatedHelper = $req->execute(array($pseudo, $content, $website, $tel, $mail, $helperType, $helperId));
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