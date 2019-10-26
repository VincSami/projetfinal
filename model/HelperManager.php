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
	    $req = $db->prepare('SELECT id, title, specialty FROM helpers');
        $req->setFetchMode(PDO::FETCH_ASSOC);
	    $req->execute();
        $helpers = $req->fetchAll();

	    return $helpers;
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

    public function getHelper($helperId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, specialty FROM helpers WHERE id = ?');
	    $req->execute(array($helperId));
	    $helper = $req->fetch();

	    if(! $helper){
	    	throw new Exception("le helper n'existe pas");
	    }
	    else {
	    return $helper;
		}
	}
}