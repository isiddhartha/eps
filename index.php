<?php
/*
SCRIPT NAME		:	index.php
AUTHOR			:	Siddhartha Chandrasekar
CREATED			:	06/09/2014
LOCATION		:	public folder of server -> www
DESCRIPTION		:	This script will be loaded first for any page request to the site, access to any 
					other script in the public folder will be denied. The script will load all the 
					necessary classes and render the requested page.
*/


/*
These variables set the folder structure of the public folder in the server. The variables are 
assigned the names to ease future alteration of folder structure.
*/
error_reporting(E_ALL);

$corePath = 'core/';
$libPath = 'lib/';
$jsPath = 'js/';
$stylesPath = 'styles/';
$controllersPath = 'controllers/';
$modelsPath = 'models/';
$viewsPath = 'views/';
$scriptsPath = 'scripts/';
$stylesPath = 'styles/';
$pluginsPath = 'plugins/';
$mediaPath = 'media/';
$otherpluginsPath = 'otherplugs/';
/*-----------------------------------------------------------------------------------------------*/
/*
sets the extension type for files specified
*/

$EXT = '.php';
$controllerPrefix = 'CO_';
$modelPrefix = 'MOD_';
$viewPrefix = 'VI_';

/*-----------------------------------------------------------------------------------------------*/
require_once($corePath.'eps_baseloader.php');
require_once($corePath.'eps_base.php');
/*error module needs to be called first followed by db, the rest of the classes can be called after 
then */
$basemods = array(
					'eps_error',
					'eps_db',
					'eps_sessionControl',
					'eps_router',
					'eps_loader'
				);

/*
declares variable names to hold objects that will be instantiated by the baseLoader script. The 
variables will have the same name as the class and will only be instantiated once.
*/

foreach($basemods as $mod)
{
	$temp = $mod;
	$$temp = FALSE;
}

/*
Object names:
error object = eps_error
database object = eps_db
session Control Object = eps_sessionControl
router object = eps_router
*/				
loadbaseclass();


$eps_router->determine();
$curController = $eps_loader->loadController();

//$eps_router->loadController();





?>
					
