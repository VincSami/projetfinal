<?php

namespace VS\MariageCoquillages\Model;

require_once('model/Manager.php');

class HelperManager extends Manager
{
	public function getHelperTypes()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title FROM helpertypes');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
	    $req->execute();
        $helperTypes = $req->fetchAll();

	    return $helperTypes;
	}	
	
	public function getHelpers($pageId)
    {	
    	$db = $this->dbConnect();  
		$numberOfHelpersByPage = 8;
		$req1 = $db->prepare('SELECT id FROM helpers');
		$req1->setFetchMode(\PDO::FETCH_ASSOC);
		$req1->execute();
		$req1->fetchAll();
		$numberOfHelpers = $req1->rowCount(); 
		$numberofPages = ceil($numberOfHelpers/$numberOfHelpersByPage);
		$actualPage = ($pageId);
		$firstLimit = ($actualPage-1)*$numberOfHelpersByPage;

		$req2 = $db->prepare('SELECT id, pseudo, content, id_type FROM helpers LIMIT' . $firstLimit . ',' . $numberOfHelpersByPage);
        $req2->setFetchMode(\PDO::FETCH_ASSOC);
	    $req2->execute();
		$helpers = $req2->fetchAll();
	    return $helpers;
	}

	public function getHelper($helperId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, content, website, tel, mail, id_type FROM helpers WHERE id = ?');
	    $req->execute(array($helperId));
        $helper = $req->fetch();
		//On vérifie que le lieu de réception demandé existe bien
	    if(! $helper){
	    	throw new Exception("le prestataire n'existe pas");
	    }
	    else {
	    return $helper;
		}
	}

    public function getHelpersType($typeId)
    {	
    	$db = $this->dbConnect();  
		$req = $db->prepare('SELECT id, pseudo, content, website, tel, mail, id_type FROM helpers WHERE id_type = ?');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute(array($typeId));
		$helpersType = $req->fetchAll();

	    return $helpersType;
	}

	public function getMemberHelpers($authorId)
	{
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, author_id FROM helpers WHERE author_id = ?');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute(array($authorId));
	    $memberHelpers = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
		return $memberHelpers;
	}

	public function pages(){

	}
}