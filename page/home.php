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
		<h1>SnapBlog !</h1>
		<div class="row">

			<?php 

				foreach($posts as $post) : 
					$title = $post->getTitle();
			?>
			<div class='col-lg-12'>
				<h3><a class='lienPost' title="<?= $title ?>" href="index.php?method=showPost&slug=<?= $post->getSlug() ?>"><?= $title ?></a></h3>
			</div>
			<?php endforeach ?>
		</div>
	</div>

	<a class="boutonAccueil" href="index.php?method=createPost">Création d'un post</a>
	
		<script src="js/jquery-2.1.1.min.js"></script>
		<script type="text/javascript" src="js/js.js"></script>
	</body>

</html>