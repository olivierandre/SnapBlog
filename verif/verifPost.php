<?php
	
	if($_POST) {

		$_SESSION['post'] = $_POST;
		$locCreatePost = 'Location: '.Config::ROOT_URL.'createPost';


		if(empty($_POST['title'])) {
			$_SESSION['error'] = "Le titre ne peut être vide";
			header($locCreatePost);
			die();
		} elseif(empty($_POST['content'])) {
			$_SESSION['error'] = "Le contenu ne peut être vide";
			header($locCreatePost);
			die();
		} elseif(empty($_POST['username'])) {
			$_SESSION['error'] = "Le username ne peut être vide";
			header($locCreatePost);
			die();
		} elseif( empty($_POST['email']) || !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) ) {
			$_SESSION['error'] = "Le mail est incorrect";
			header($locCreatePost);
			die();
		}

		$title = strip_tags($_POST['title']);
		$content = strip_tags($_POST['content']);
		$username = strip_tags($_POST['username']);
		$email = strip_tags($_POST['email']);

		$post = new Post();
		$post->setTitle($title);
		$post->setContent($content);
		$post->setUsername($username);
		$post->setEmail($email);
		
		$postManager = new PostManager();
		
		if(!$postManager->save($post)) {
			$error = "Une erreur est intervenue lors de la création du post";
			header($locCreatePost);
			die();
		}
		
	}

	$_SESSION['post'] = "";
	header('Location: '.Config::ROOT_URL.'home');
	die();

	

?>