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

    public function getHelpersByType($typeId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title FROM helpers WHERE typeId = ?');
	    $req->execute(array($typeId));
	    $helpersByType = $req->fetch();

	    if(! $helpersByType){
	    	throw new Exception("le helper n'existe pas");
	    }
	    else {
	    return $helpersByType;
		}
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