<?php

class projectObj
{
	//class properties-->hold basic info about a project
	private $projId;
	private $projTitle;
	private $projDesc;
	private $projDoc;
	private $projAdmin;
	private $projType;
	private $projVisibility;
	private $projImage;
	private $lastUpdated;
	
	private $db; //universal resource of database
	//methods pertaining to the project object
	
	//called automatically on initialization of object
	//make calls to retreive data from various tables
	public function __construct($id)
	{
		$this->connectDb();
		$this->getBasicInfo($id);
	}
	
	private function connectDb()
	{
		$db = new db();
		$this->db = $db->getDb();
	}
	
	protected function getBasicInfo($id)
	{
		$query = "select * from project where proj_id=".$id;
		$result = $this->db->query($query);
		$row = $result->fetch_assoc();
		$this->projId = $row['proj_id'];
		$this->projTitle = $row['title'];
		$this->projDesc = $row['description'];
		$this->projAdmin = $row['admin'];
		$this->projType = $row['type'];
		$this->projDoc = $row['doc'];
		$this->projVisibility = $row['visibility'];
		$this->projImage = $row['image'];
		$this->lastUpdated = $row['lastUpdate'];
		echo $this->projId.'</br>'.$this->projTitle.'</br>'.$this->projDesc.'</br>'.$this->projAdmin.'</br>'.$this->projType.'</br>'.$this->projDoc.'</br>'.$this->projVisibility.
		'</br>'.$this->projImage.'</br>'.$this->lastUpdated;
	}	
}
?>