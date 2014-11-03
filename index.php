
	<?php
		session_start();
		// index.php devient le contrôleur frontal

		// autochargement de classe
		spl_autoload_register();

		$method = 'home';

		if(!empty($_GET['method'])) {
			$method = $_GET['method'];
		}
		
		$controller = new MainController();

		// Appelle la méthode dans le controleur
		//call_user_func(array($controller, $method));
		call_user_func(array(new MainController(), $method));

	?>
