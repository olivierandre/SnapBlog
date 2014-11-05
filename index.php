
	<?php
		session_start();
		// index.php devient le contrôleur frontal

		// autochargement de classe
		spl_autoload_register(function($className){
			$path = str_replace("\\", "/", $className);
			require($path.".php");
		});

		// Autochargement des codes tiers (composer)
		include("vendor/autoload.php");
		include("vendor/phpmailer/phpmailer/PHPMailerAutoload.php");

		$method = 'home';

		if(!empty($_GET['method'])) {
			$method = $_GET['method'];
		}
		
		//$controller = new Controller\MainController();

		// Appelle la méthode dans le controleur
		//call_user_func(array($controller, $method));
		call_user_func(array(new Controller\MainController(), $method));

	?>
