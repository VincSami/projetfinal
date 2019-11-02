<?php

require_once('model/Manager.php');

class HelperManager extends Manager
{
	public function getHelperTypes()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title FROM helpertypes');
        $req->setFetchMode(PDO::FETCH_ASSOC);
	    $req->execute();
        $helperTypes = $req->fetchAll();

	    return $helperTypes;
	}	
	
	public function getHelpers()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, content FROM helpers');
        $req->setFetchMode(PDO::FETCH_ASSOC);
	    $req->execute();
        $helpers = $req->fetchAll();

	    return $helpers;
	}

	public function getHelper($helperId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, content, website, tel, email, id_type FROM helpers WHERE id = ?');
	    $req->execute(array($helperId));
        $helper = $req->fetch();
		//On vérifie que le lieu de réception demandé existe bien
	    if(! $helper){
	    	throw new Exception("le lieu de réception n'existe pas");
	    }
	    else {
	    return $helper;
		}
	}

    public function getHelpersType($typeId)
    {	
    	$db = $this->dbConnect();  
		$req = $db->prepare(
		'SELECT *
		FROM helpers
		INNER JOIN helpertypes ON helpers.id_type = helpertypes.id
		WHERE helpertypes.id = ?'
		);
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute(array($typeId));
		$helpersType = $req->fetchAll();

	    return $helpersType;
	}

	public function getMemberHelpers($authorId)
	{
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, author_id FROM helpers WHERE author_id = ?');
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute(array($authorId));
	    $memberHelpers = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
		return $memberHelpers;
	}
}