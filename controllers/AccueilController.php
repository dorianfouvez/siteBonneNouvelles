<?php 
class AccueilController{
	
	public function __construct() {

	}
			
	public function run(){	
		
		# Un contrôleur se termine en écrivant une vue
		require_once(PATH_VIEWS . 'accueil.php');
	}
	
}