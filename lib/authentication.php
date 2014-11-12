<?php
class sessionControl
{
	private $db;
	
	protected $sid;
	protected $user;
	protected $logintime;
	protected $authlevel;
	protected $type;
	protected $name;
	protected $title;
	
	public function __construct()
	{
		$this->db = new db();
		$this->db = $db->get_db();	//makes connection to database
		
	}
	
	public function login($username, $password, $type="default")
	{
		if (isset($username) && isset($password))
		{ 

			if($this->db)
			{
				$query="select * from user where username='".$username."' and password= password('".$password."')";
				$result=$this->db->query($query);

				if($result->num_rows==1)
				{
					$this->initialize($result->fetch_array());
				}
				else
				{
				session_start();
				$_SESSION['error']=1;
				header('location:/index.php');
				}
			}
			else 
			{
				$error=new errormod(1);
			}
		}
	}
	
	private function initialize($res)
	{
		session_start();
		$this->sid = 
		$_SESSION['logged']=1;
		$_SESSION['user']=$res['username'];
		$_SESSION['error']=NULL;
		header('location:/explore.php');
	}
}

?>