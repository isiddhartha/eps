<?php


/*
Known Issues:
1. session control does not login with cookies disabled
*/
class eps_sessionControl extends eps_base
{
/*	private $db;
	private $dbObj;
//	private $rootobj;
//	private $ROOT;*/
	private $errorCode;
	protected $authLevel;
	public $status;

/**************************************************************************************************/
	
	public function __construct()
	{
		$this->status = FALSE;
		$this->errorCode =0;
		parent::initializeCore();
	/*	global $eps_db;
		global $eps_error;*/
		
//		$this->db = $eps_db->getDB();
//		$this->db = $this->dbObj->getDb();	//makes connection to database
//		$this->rootobj = new config();	
//		$this->ROOT = $this->rootobj->ROOT; //retrieves root path
		
		if(!isset($_SESSION)) //just a condition to start session if it has not been started 
							  //externally by the main script
		{
			session_start(); 
		}
		
		if($this->db)
		{			
			if(isset($_POST['logout']) && $_POST['logout']=='logout') //if logout command is given 
											//it goes to logout function to de-register the session
			{
				$_POST['logout'] = NULL;
				$this->logout();
			}
			else
			{
				$this->authenticate();
			}
		}
		else
		{
			$this->errorCode = 50;
		}
		$this->errorhandler($this->errorCode);
		$this->status = TRUE;
	}

/**************************************************************************************************/
	
	public function login($email, $password, $link)
	{
		if (isset($email) && isset($password))
		{ 
			$query="select * from user where email='".$email."' and password= password('".$password.
					"')";
			$result=$this->db->query($query);

			if($result->num_rows==1)
			{
				$this->registerSession($result->fetch_array());
				$this->registercookie();
				$this->redirect($link);
			}
			else
			{
				$this->errorCode = 1;
				$_SESSION['error']=1;
				$_SESSION['logged'] =0;
				$this->redirect('default');
			}
		}
	}
	
/**************************************************************************************************/

	private function registerSession($res)
	{
		//setting the post variables to none to prevent the page from asking if it should reload the
		//passed variables while reloading page
		$_POST['usr'] = NULL; 
		$_POST['pass'] = NULL;
		
		$_SESSION['uid'] = $res['user_id'];
		$_SESSION['email'] = $res['email'];
		$_SESSION['error'] = 0;
		
		
		
		$query = "select * from user_prof where user_id ='".$res['user_id']."'";
		$result = $this->db->query($query);
		if($result->num_rows==1)
		{	
			$result = $result->fetch_array();
			$_SESSION['name'] = $result['fname'].' '.$result['lname'];
			$_SESSION['status'] = 'available';
			$_SESSION['logged'] = 1;	//indicating that session is registered
		}
		else 
		{
			$this->errorCode= 1;
		}
		
		$chkquery = "select * from current_users where user_id ='". $res['user_id']."'";
		$result = $this->db->query($chkquery);
		//check if user is already logged in from another browser or computer, if so obtain secret 
		//key for that session
		if($result->num_rows>0) 
		{
			$result = $result->fetch_array();
			$_SESSION['key'] = $result['sec_key'];
		}
		else	//if not availbae in current_user table, then create record
		{
			$rnd = rand();	
			$rnd = md5($rnd);
			$_SESSION['key'] = $rnd;
				
			$temp = $this->dbObj->dbDet('dbname');
			$query = "insert into ".$temp.".current_users (`user_id`,`sec_key`,`status`) values ('".
						$res['user_id']."','".$rnd."','avail')";
			$result = $this->db->query($query);
		}
	}


/**************************************************************************************************/
/*funtcion is called to logout the present users and destroy session variables and cookie settings*/
	private function logout()
	{
		if(isset($_SESSION['uid']))
		{
			//not required, db name inclusion in query is another way of doing it --> not sure
			$temp = $this->dbObj->dbDet('dbname'); 
			$query = "delete from ".$temp.".current_users where current_users.user_id=".
			$_SESSION['uid']; //used to delete the user from the current_users table in the DB
			$result = $this->db->query($query);
			
			
			foreach ($_SESSION as $val)
			{
				$val = NULL;
			}
			//these 2 session variables are set to indicate user has logged out and there was no 
			//error
			$_SESSION['logged'] = 0;	
			$_SESSION['error'] = 0;
			session_destroy();	//  session is destroyed to indicate no session is available unless 
								//initiated by the contructor of this class
			
		}
		$this->cookiedestroy(); //cookie shoudl be destroyed before sending any other header to the 
								//page to be called
//		if(isset($_COOKIE["epsUID"]))
//		echo $_COOKIE["epsUID"];
//		else 
//		{echo "OOPS";}
//		if(!isset($_COOKIE['epsUID']))
		$this->redirect('default');
	}

/**************************************************************************************************/
	private function cookiedestroy()
	{
		
		if(isset($_COOKIE['epsUID']))
		{
			setcookie("epsUID","",time()-3600,"/");
			setcookie("epsKEY","",time()-3600,"/");
			$_COOKIE = NULL;
		}
	}
	
/**************************************************************************************************/

	private function authenticate()
	{
		
		if(!isset($_SESSION['logged']) || $_SESSION['logged'] == 0) // if user is not logged in, 
															//indicated by logged session variable
		{
			if(isset($_POST['usr']) && isset($_POST['pass']))	//if user name and password are 
																//provided
			{
				if(isset($GLOBALS['link']))	//when a redirection page has been indicated using LINK 
											//global variable in the main calling script
				{
					$this->login($_POST['usr'],$_POST['pass'],$GLOBALS['link']);
				}
				else
				{
					$this->login($_POST['usr'],$_POST['pass'],'default');
				}	
			}
			elseif (isset($_COOKIE['epsUID']) && isset($_COOKIE['epsKEY'])) //if cookie has been set
																	//then script follows this route
			{
				$query = "select * from current_users where user_id='".$_COOKIE['epsUID']."' and 
						sec_key='".$_COOKIE['epsKEY']."'"; //checks if the cookie matches with the 
														   //data in current_users table
				$result = $this->db->query($query);
				if($result->num_rows==1) //if matched
				{
					$result = $result->fetch_array();
					$query1 = "select * from user where user_id='".$result['user_id']."'"; 
															//retrieve user details form user table
					$result1 = $this->db->query($query1);
					if ($result1->num_rows ==1) //if user avilable
					{	
						$result1 = $result1->fetch_array();
						$_SESSION['email'] = $result1['email'];
						$_SESSION['uid'] = $result1['user_id'];
						$query2= "select * from user_prof where user_id='".$result['user_id']."'"; 
													// to retrieve user details from user_prof table
						$result2 = $this->db->query($query2);
						if($result2->num_rows==1)
						{
							$result2 = $result2->fetch_array();
							$_SESSION['name']=$result2['fname'].' '.$result2['lname'];
							$_SESISON['error']=0;
							$_SESSION['logged'] = 1;
						}
						else
						{
							$this->errorCode = 2; 
						}
					}
					else
					{
						$this->errorCode=2; 
					}
				}
				else
				{	
					$this->errorCode = 2;
				}
			}
			else
			{
				$_SESSION['logged'] = 0;
			}
		}
		else
		{
			$_SESSION['error'] = 0;
			$_SESSION['logged'] = 1;
		}
	}

/**************************************************************************************************/

	private function redirect($link)
	{
		if($link == 'default')
		{
			header('Location: http://localhost'.$_SERVER['PHP_SELF']);
		}
		else
		{
			$link = '/index.php/'.$link;
			header('Location: http://localhost'.$link);
		}
	}

/**************************************************************************************************/

	private function registercookie()
	{
		if(isset($_COOKIE))
		{
			setcookie("epsUID",$_SESSION['uid'],time()-864000,"/");
			setcookie("epsKEY",$_SESSION['key'],time()-864000,"/");
		}
		setcookie("epsUID",$_SESSION['uid'],time()+864000,"/");
		setcookie("epsKEY",$_SESSION['key'],time()+864000,"/");
	}
/**************************************************************************************************/
	
	private function errorhandler($error) //error codes are passed to this function, it decides on 
						//the level of error and error messages and passes it to general errormod
	{
	
	/*ERROR CODES
	0 -> No error, do nothing and just pass out of the function
	1 -> Login issues, such as user name and password not matching, or query failure
	2 -> Authentication failure, such as user record not available in current_users table, or 
		mismatch of cookie and record data, and all errors relating to this accord
	50 -> Database connectivity failures
	*/
		$msg;
		switch($error)
		{
			case 0:
			 break;
			case 1:
				$msg = "User Login Failed";
				break;
			case 2:
				$this->logout();
				$msg = "User Authentication Failed. You have been logged out";
				break;
			case 50:
				$msg = "Database connectivity failed";
				break;
			default:
				echo"nothing";
				break;
		}
		
		if($error !=0) //if error is zero, then no error occured so carry on
		{
			echo $error;
			$_SESSION['error'] = 1;
	//		$error = new errormod($error,NA,NA, $msg);
		}
		else
		{
			$_SESSION['error'] = 0;
		}
	}
	
	
}
?>