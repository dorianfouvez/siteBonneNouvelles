<?php
	$time_start = microtime(true);

	# Site Global Variables
    define('CHEMIN_CONTROLLERS','controllers/');
    define('PATH_MODELS','models/');
	define('PATH_VIEWS','views/');
	define('PATH_CSS',PATH_VIEWS . 'css/');
	define('PATH_IMAGES',PATH_VIEWS . 'images/');
	define('PATH_SCRIPTS',PATH_VIEWS . 'scripts/');
    define('EMAIL','jeanluc.collinet@ipl.be');
	$date = date("j/m/Y");
	
	# Autoloading class
	function chargerClasse($classe) {
		require 'models/' . $classe . '.class.php';
	}
	spl_autoload_register('chargerClasse'); 

	require_once(PATH_VIEWS . 'header.php');
	require_once(PATH_VIEWS . 'menu.php');

    function prepareController($controllerName){
        require_once(CHEMIN_CONTROLLERS . $controllerName . '.php');
        return new $controllerName();
    }

    $action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';
    switch($action) {
		case 'genese':
			$controller = prepareController('GeneseController');
            break;
		case 'livres':
            $controller = prepareController('LivresController');
			break;
		case 'contact':
            $controller = prepareController('ContactController');
			break;
		case 'login':
			$controller = prepareController('LoginController');	
		default:
            $controller = prepareController('AccueilController');
			break;
	}
	$controller->run();

	require_once(PATH_VIEWS . 'footer.php');

?>