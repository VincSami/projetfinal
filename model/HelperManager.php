<?php

namespace VS\MariageCoquillages\Model;

require_once('model/Manager.php');

class HelperManager extends Manager
{
	//récupère tous les types de prestataires
	public function getHelperTypes()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title FROM helpertypes');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
	    $req->execute();
        $helperTypes = $req->fetchAll();

	    return $helperTypes;
	}	
	//récupère tous les prestataires en les regroupant par page
	public function getHelpers($pageId)
    {	
		//nombre de prestataires à afficher par page
		$numberOfHelpersByPage = 8;
		//on détermine la page actuel qui est égale à l'id de la page qui est passé en paramètre
		$actualPage = ($pageId);
		//on détermine le premier prestataire à afficher selon la page actuelle
		$firstLimit = ($actualPage-1)*$numberOfHelpersByPage;
		//on récupère les données nécessaires de la bdd
		$db = $this->dbConnect();
		$req2 = $db->prepare('SELECT id, pseudo, content, id_type FROM helpers LIMIT ' . $firstLimit . ' , ' . $numberOfHelpersByPage);
        $req2->setFetchMode(\PDO::FETCH_ASSOC);
	    $req2->execute();
		$helpers = $req2->fetchAll();
	    return $helpers;
	}
	//détermine le nombre de pages nécessaires pour l'affichage des prestataires
	public function getPageCount()
	{
		//nombre de prestataires à afficher par page
		$numberOfHelpersByPage = 8;
		$db = $this->dbConnect();  
		$req1 = $db->prepare('SELECT id FROM helpers');
		$req1->setFetchMode(\PDO::FETCH_ASSOC);
		$req1->execute();
		//on détermine le nombre de prestataires total
		$numberOfHelpers = intval($req1->rowCount());
		$req1->closeCursor();
		//on détermine le nombre de pages nécessaires
		$numberofPages = ceil($numberOfHelpers/$numberOfHelpersByPage);

		return $numberofPages;
	}
	//récupère le prestataire demandé
	public function getHelper($helperId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, content, website, tel, mail, id_type, author_id FROM helpers WHERE id = ?');
	    $req->execute(array($helperId));
        $helper = $req->fetch();
		//On vérifie que le prestataire demandé existe bien
	    if(! $helper){
	    	throw new \Exception("le prestataire n'existe pas");
	    }
	    else {
	    return $helper;
		}
	}
	//récupère le type de prestataires demandé
    public function getHelpersType($typeId)
    {	
    	$db = $this->dbConnect();  
		$req = $db->prepare('SELECT id, pseudo, content, website, tel, mail, id_type FROM helpers WHERE id_type = ?');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute(array($typeId));
		$helpersType = $req->fetchAll();

	    return $helpersType;
	}
	//on récupère les prestataires créés par le membre
	public function getMemberHelpers()
	{
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, author_id FROM helpers WHERE author_id = ?');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute(array($_SESSION['id']));
	    $memberHelpers = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
		return $memberHelpers;
	}
}