<?php

require_once('model/Manager.php');

class WeddingplannerManager extends Manager
{
	public function getTopWeddingplanners()
    {	
    	$db = $this->dbConnect();  
		$req = $db->prepare('SELECT id, pseudo, specialty, likes FROM weddingplanners ORDER BY likes DESC');
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute();
        $topWeddingplanners = $req->fetchAll();

	    return $topWeddingplanners;
	}
	
	public function getWeddingplanners()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, specialty, likes FROM weddingplanners ORDER BY likes DESC');
        $req->setFetchMode(PDO::FETCH_ASSOC);
	    $req->execute();
        $weddingplanners = $req->fetchAll();

	    return $weddingplanners;
	}

	public function getWeddingplanner($weddingplannerId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, presentation FROM weddingplanners WHERE id = ?');
	    $req->execute(array($weddingplannerId));
        $weddingplanner = $req->fetch();
		//On vérifie que le lieu de réception demandé existe bien
	    if(! $weddingplanner){
	    	throw new Exception("le lieu de réception n'existe pas");
	    }
	    else {
	    return $weddingplanner;
		}
	}

	public function getWeddingplannersByType($specialty)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, specialty FROM weddingplanners WHERE specialty = ?');
	    $req->execute(array($specialty));
        $weddingplanners = $req->fetch();

	    return $weddingplannersByType;
	}

	public function getMemberWeddingplanners($authorId)
	{
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, pseudo, presentation, author_id FROM weddingplanners WHERE author_id = ?');
		$req->setFetchMode(PDO::FETCH_ASSOC);
		$req->execute(array($authorId));
	    $memberWeddingplanners = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
	    return $memberWeddingplanners;
	}
}