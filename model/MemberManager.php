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
		//On récupère l'id et le mdp lié au pseudo renseigné
		$req = $db->prepare('INSERT INTO members(pseudo, pass, email, subscription_date, member_type) VALUES (?, ?, ?, NOW())');
		$resultat = $req->execute(array($pseudo, $pass, $email));

		if (! $resultat){
			throw new Exception('Impossible de créer le nouveau membre');
		}
	}

	public function connectMember($pseudo, $pass)
	{
		//Si l'admin est déjà connecté on termine la fonction ici
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
		$isPasswordCorrect = password_verify($_POST['passMember'], $resultat['pass']);
		//Si le pseudo renseigné n'est pas trouvé dans la bdd...
		if (!$resultat)
		{
   			throw new Exception('Mauvais identifiant ou mot de passe !');
		}
		//Si le pseudo est trouvé et que le mdp renseigné est correct, on connecte l'admin
    	if ($isPasswordCorrect) {
			if($resultat['member_type'] == "user"){
			$_SESSION['type'] = "user";
			$_SESSION['id'] = $resultat['id'];
			$_SESSION['pseudo'] = $pseudo;
			}
    	}
    	//Si mauvais mdp ...
    	else {
        throw new Exception('Mauvais identifiant ou mot de passe !');
    	}	
	}

}