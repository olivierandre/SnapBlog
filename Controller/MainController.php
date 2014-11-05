<?php
	
	namespace Controller;

	use \Model\PostManager;
	use \Model\CommentManager;
	use \Model\Post;
	use \Model\Comment;
	use \Model\PostValidator;
	use \Model\CommentValidator;
	use \Config;
	use \Model\User;

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
			$comment = new Comment();
			$commentValidator = new CommentValidator();

			$slug = $_GET['slug'];
			$post = $postManager->findPostBySlug($slug);
			$idPost = $post->getId();
			$timePost = $post->getDateCreated();
			$delai = 'PT4H';
			$fin = \Tool\DateTool::minutesLeft($timePost, $delai);

			if(User::isCookieUserExist()) {
				$comment->setUsername(User::getUsernameViaCookie());
				$comment->setEmail(User::getEmailViaCookie());
			}
			
			if(!empty($_POST)) {
				
				$comment->setPostId($idPost);
				$comment->setUsername($_POST['username']);
				$comment->setEmail($_POST['email']);
				$comment->setContent($_POST['content']);

				if($commentValidator->isValid($comment)) {
					$commentManager = new CommentManager();

					if($commentManager->save($comment)) {
						if(!User::isCookieUserExist()) {
							User::setCookieUser($post->getUsername(), $post->getEmail());
						}

						$mail = new Mailer();
						$send = $mail->sendThankYou($post->getUsername(), $post->getEmail(), 'comment');

						header('Location: '.Config::ROOT_URL.'showPost&slug='.$slug);
					} else {
						$error = "Une erreur est intervenue";
						header('Location: '.Config::ROOT_URL.'showPost&slug='.$slug);
					}
				} 
		
			}

			$commentManager = new CommentManager;
			$comments = $commentManager->getCommentByIdPost($idPost);

			include("page/detailPost.php");
		}

		public function createPost() {
			$post = new Post();
			$postValidator = new PostValidator();

			if(User::isCookieUserExist()) {
				$post->setUsername(User::getUsernameViaCookie());
				$post->setEmail(User::getEmailViaCookie());
			}

			if(!empty($_POST)) {

				$postManager = new PostManager();
				$title = $_POST['title'];

				$post->setTitle($title);
				$post->setContent($_POST['content']);
				$post->setUsername($_POST['username']);
				$post->setEmail($_POST['email']);
				$post->setSlug($title);

				if($postValidator->isValid($post)) {
					
					
					if($postManager->save($post)) {

						if(!User::isCookieUserExist()) {
							User::setCookieUser($post->getUsername(), $post->getEmail());
						}

						$mail = new Mailer();
						$send = $mail->sendThankYou($post->getUsername(), $post->getEmail(), 'post');
						
						header('Location: '.Config::ROOT_URL.'home');
					} else {
						header('Location: '.Config::ROOT_URL.'createPost');
					}
				}
				
			}

			include("page/createPost.php");	
		}

		public function verifPost() {
			include("verif/verifPost.php");
		}

	}