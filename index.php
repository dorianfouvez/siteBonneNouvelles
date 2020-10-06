<?php
	# Prise du temps actuel au début du script
	$time_start = microtime(true);

	# Variables globales du site
	define('CHEMIN_VUES','views/');
    define('EMAIL','jeanluc.collinet@ipl.be');
    define('CHEMIN_CONTROLLERS','controllers/');
	$date = date("j/m/Y");
	
	# Require des classes automatisé
	function chargerClasse($classe) {
		require 'models/' . $classe . '.class.php';
	}
	spl_autoload_register('chargerClasse'); 

	# Ecrire ici le header de toutes pages HTML
	require_once(CHEMIN_VUES . 'header.php');
	
	# Ecrire ici le menu du site de toutes pages HTML
	require_once(CHEMIN_VUES . 'menu.php');

	# Tester si une variable GET 'action' est précisée dans l'URL index.php?action=...
	$action = (isset($_GET['action'])) ? htmlentities($_GET['action']) : 'default';
	# Quelle action est demandée ?

function prepareController($controllerName){
    require_once(CHEMIN_CONTROLLERS . $controllerName . '.php');
    return new $controllerName();
}

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
		default:
            $controller = prepareController('AccueilController');
			break;
	}
	# Exécution du contrôleur correspondant à l'action demandée
	$controller->run();
	
	# Ecrire ici le footer du site de toutes pages HTML
	require_once(CHEMIN_VUES . 'footer.php');

?>