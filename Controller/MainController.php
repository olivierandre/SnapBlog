<?php
	
	namespace Controller;

	use \Model\PostManager;
	use \Model\CommentManager;
	use \Model\Post;
	use \Model\Comment;
	use \Model\Validator;
	use \Config;


	class MainController {

		public function home() {

			// Récupérer les 10 derniers posts
			$postManager = new PostManager();

			$posts = $postManager->findLatest();

			// faire un include du fichier HTML
			include("page/home.php");
		}

		public function showPost() {
			$postManager = new PostManager();
			$idPost = $_GET['id'];
			$post = $postManager->findPostById($idPost);
			$comment = new Comment();
			$timePost = $post->getDateCreated();
			$delai = 'PT4H';
			$fin = \Tool\DateTool::minutesLeft($timePost, $delai);
			
			if(!empty($_POST)) {
				$comment->setPostId($idPost);
				$comment->setUsername($_POST['username']);
				$comment->setEmail($_POST['email']);
				$comment->setContent($_POST['content']);

				$validator = new Validator();
				$validator->validateEmail($comment->getEmail(), 'email');

				if($validator->isValid()) {
					$commentManager = new CommentManager();

					if($commentManager->save($comment)) {
						header('Location: '.Config::ROOT_URL.'showPost&id='.$idPost);
						die();
					} else {
						$error = "Une erreur est intervenue";
						header('Location: '.Config::ROOT_URL.'showPost&id='.$idPost);
						die();
					}
				} else {
					$error = "Une erreur est intervenue";
					header('Location: '.Config::ROOT_URL.'showPost&id='.$idPost);
					die();
				}
		
			}

			$commentManager = new CommentManager;
			$comments = $commentManager->getCommentByIdPost($idPost);

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