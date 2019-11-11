<?php

namespace VS\MariageCoquillages\Model;

require_once('model/Manager.php');

class PlaceManager extends Manager
{
	public function getTopPlaces()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, city, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, ranked FROM places ORDER BY ranked DESC LIMIT 0,5');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
	    $req->execute();
        $topPlaces = $req->fetchAll();

	    return $topPlaces;
	}
		
	public function getPlaces()
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, city, positionx, positiony, region, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr, ranked FROM places ORDER BY creation_date DESC');
        $req->setFetchMode(\PDO::FETCH_ASSOC);
	    $req->execute();
        $places = $req->fetchAll();

	    return $places;
	}

    public function getPlace($placeId)
    {	
    	$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, city, positionx, positiony, region, website, tel, mail, presentation FROM places WHERE id = ?');
	    $req->execute(array($placeId));
	    $place = $req->fetch();
		//On vérifie que le lieu de réception demandé existe bien
	    if(! $place){
	    	throw new Exception("le lieu de réception n'existe pas");
	    }
	    else {
	    return $place;
		}
	}

	public function getMemberPlaces($authorId)
	{
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, presentation, author_id FROM places WHERE author_id = ?');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute(array($authorId));
	    $memberPlaces = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
		return $memberPlaces;
	}

	public function getCoordinates(){
		$db = $this->dbConnect();  
	    $req = $db->prepare('SELECT id, title, positionx, positiony, presentation FROM places');
		$req->setFetchMode(\PDO::FETCH_ASSOC);
		$req->execute();
	    $placesCoords = $req->fetchAll();
		//On vérifie que le lieu de réception demandé existe bien
		return $placesCoords;
	}
}