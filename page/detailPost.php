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
		<h1><?= $post->getTitle() ?></h1>
		<div class="row">

			<div class='col-lg-12'>
				<h3>Le contenu => <?= $post->getContent() ?></h3>
				<h3>L'auteur => <?= $post->getUsername() ?></h3>
				<h3>Son email => <?= $post->getEmail() ?></h3>
				<h3>La date de création du post => <?= \Tool\DateTool::dateFrWithHour($timePost) ?></h3>
			</div>
			<div class="col-xs-3 finPost">
				<p>Le blog disparaîtra dans <span class="time"><?= $fin ?></span></p>
			</div>

			<div class="clearfix"></div>

			<button class="buttonAddComment">Ajouter un commentaire</button>
			<form id="formCommentPost" role="form" method="POST">
			  	<div class="form-group">
				    <label for="username">Username du commentateur</label>
					<input type="text" class="form-control" name="username" id="username" value="<?= $comment->getUsername() ?>" >
				</div>
				 <div class="form-group">
				    <label for="email">Email du commentateur</label>
					<input type="email" class="form-control" name="email" id="email" value="<?= $comment->getEmail() ?>">
				</div>
				<div class="form-group">
					<label for="content">Contenu du commentaire</label>
				    <textarea class="form-control" name="content" rows="3"><?= $comment->getContent() ?></textarea>
				</div>
				
				  <button type="submit" class="buttonSubmitComment">Envoyer votre commentaire !!!!</button>
			</form>

			<button class="buttonAfficheComment">Afficher les commentaires</button>

			<div id="showComment">

				<?php 
					$compteur = 1;
					foreach($comments as $comment) :
						if($compteur%2) {
							$class = 'pair';
						} else {
							$class = 'impair';
						}
						$compteur += 1;
				?>
					<div class='col-lg-12 <?= $class ?>'>
						<p>Commentaire de <?= $comment->getUsername() ?> (<?= $comment->getEmail() ?>), le <?= \Tool\DateTool::dateFr($comment->getDateCreated()) ?></p>
						<p><?= $comment->GetContent() ?></p>
					</div>
				<?php endforeach ?>
			</div>
		</div>
	</div>

	<a class="boutonAccueil" href="index.php?method=home">Retour accueil</a>
	
		<script src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
	</body>

</html>