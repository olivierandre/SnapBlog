<!DOCTYPE HTML>
<html>
	<head>
		<meta charset="utf8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
   		<meta name="viewport" content="width=device-width, initial-scale=1">

		<title>SnapBlog</title>
		<meta name="description" content="">
		<link href='http://fonts.googleapis.com/css?family=Raleway:300, 400, 700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" href="css/bootstrap.css" />
		<link rel="stylesheet" href="css/bootstrap-theme.css" />
		<link rel="stylesheet" href="css/style.css" /> 
		<link rel="stylesheet" href="css/style_rd.css" />
	</head>
	<body>

	<div class="container">
		<h1>Création d'un post</h1>
		<div class="row">
			<?php

				$errorTitle = '';
				$errorContent = '';
				$errorUsername = '';
				$errorEmail = '';

				$errors = $postValidator->getErrors();

				if(!empty($errors['title'])) {
					$errorTitle = $errors['title'][0];
				}
				if(!empty($errors['content'])) {
					$errorContent = $errors['content'][0];
				}
				if(!empty($errors['username'])) {
					$errorUsername = $errors['username'][0];
				}
				if(!empty($errors['email'])) {
					$errorEmail = $errors['email'][0];
				}
			?>		

			<form id="formCreatePost" role="form" method="POST">
			  	<div class="form-group">
			    	<label for="title">Titre du post</label>
			    	<input type="text" class="form-control" id="title" name="title" value="<?= $post->getTitle() ?>">
			    	<p><?= $errorTitle ?></p>
			  	</div>
				<div class="form-group">
					<label for="content">Contenu du post</label>
				    <textarea class="form-control" name="content" rows="3"><?= $post->getContent() ?></textarea>
				    <p><?= $errorContent ?></p>
				</div>
				<div class="form-group">
				    <label for="username">Username de l'auteur</label>
					<input type="text" class="form-control" name="username" id="username" value="<?= $post->getUsername() ?>" >
					<p><?= $errorUsername ?></p>
				</div>
				 <div class="form-group">
				    <label for="email">Email de l'auteur</label>
					<input type="email" class="form-control" name="email" id="email" value="<?= $post->getEmail(); ?>">
					<p><?= $errorEmail ?></p>
				</div>
				  <button type="submit" class="btn btn-success">Création du post</button>
			</form>

		</div>
	</div>

	<a class="boutonAccueil" href="index.php?method=home">Retour accueil</a>
	
		<script src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
	</body>

</html>