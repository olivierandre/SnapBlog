<?php

	class MainController {

		public function insertPost() {
			$unPost = new Post();
		
			$unPost->setTitle("Un titre");
			$unPost->setContent("Un contenu");
			$unPost->setUsername("Viggo");
			$unPost->setEmail("olivier.andre77@gmail.com");
			$unPost->setPublished(true);

			$postManager = new PostManager();
			$postManager->save($unPost);
		}

		public function home() {

			// Récupérer les 10 derniers posts
			$postManager = new PostManager();

			$posts = $postManager->findLatest();

			// faire un include du fichier HTML
			include("page/home.php");
		}

	}