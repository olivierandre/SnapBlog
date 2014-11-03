<?php

	class MainController {

		public function insertPost() {

		}

		public function home() {

			// Récupérer les 10 derniers posts
			$postManager = new PostManager();

			$posts = $postManager->findLatest();

			// faire un include du fichier HTML
			include("page/home.php");
		}

		public function showPost() {
			$postManager = new PostManager();

			$id = $_GET['id'];

			$post = $postManager->findPostById($id);

			include("page/detailPost.php");
		}

		public function createPost() {

			$post = new Post();

			if(!empty($_POST)) {
				$post->setTitle($_POST['title']);
				$post->setContent($_POST['content']);
				$post->setUsername($_POST['username']);
				$post->setEmail($_POST['email']);

				$validator = new Validator();
				$validator->validateEmail($post->getEmail(), 'email');

				if($validator->isValid()) {
					$postManager = new PostManager();

					if($postManager->save($post)) {
						header('Location: '.Config::ROOT_URL.'home');
						die();
					} else {
						$error = "Une erreur est intervenue";
						header('Location: '.Config::ROOT_URL.'createPost');
						die();
					}
				} else {
					$error = "Une erreur est intervenue";
					header('Location: '.Config::ROOT_URL.'createPost');
					die();
				}
		
				
			}

			

			include("page/createPost.php");	
		}

		public function verifPost() {
			include("verif/verifPost.php");
		}

	}