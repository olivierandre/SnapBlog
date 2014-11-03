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
				<h3>La date de création du post => <?= DateTool::dateFr($post->getDateCreated()) ?></h3>
				<h3>La date de dernière MAJ => <?= DateTool::dateFr($post->getDateModified()) ?></h3>
			</div>

		</div>
	</div>

	<a class="boutonAccueil" href="index.php?method=home">Retour accueil</a>
	
		<script src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
	</body>

</html>