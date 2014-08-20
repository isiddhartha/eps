<?php
class sessionControl
{
	private $db;
	

	protected $authLevel;

	
	public $sessionStatus;

/*********************************************************************************************************************************************************/
	
	public function __construct()
	{
		$this->db = new db();
		$this->db = $this->db->getDb();	//makes connection to database
		if(isset($_SESSION['logged']))
		{
			if($_SESSION['logged']==1)
			{
				$this->sessionStatus = 1;
			}
			else
			{	
				$this->sessionStatus = 0;
				if(isset($_POST['usr']))
				{
					$this->login($_POST['usr'],$_POST['pass'],'default');
				}
			}
		}
	}

/*********************************************************************************************************************************************************/
	
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
					$this->registerSession($result->fetch_array());
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
	
/*********************************************************************************************************************************************************/

	private function registerSession($res)
	{
		@session_start();
		$_SESSION['logged']=1;
		$_SESSION['user']=$res['username'];
		$_SESSION['error']=NULL;
		$this->authLevel = 1;
		
		$query = "select * from user_prof where uname ='".$res['username']."'";
		$result = $this->db->query($query);
		if($result->num_rows==1)
		{	
			$result = $result->fetch_array();
			$_SESSION['name'] = $result['fname'].' '.$result['lname'];
			$_SESSION['uname'] = $result['uname'];
		}
		else 
		{
			$error= new errormod(100);
		}
	}


/*********************************************************************************************************************************************************/

	private function logout()
	{
		if(isset($_SESSION['user']))
		{	
			$_SESSION['user']=NULL;
			session_destroy();
			$this->sessionStatus = 0;
		}
	}
}
?>