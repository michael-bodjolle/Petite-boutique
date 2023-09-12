<!DOCTYPE html>
<html class="full">

<head>
	<title>profil</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.6.0/dist/umd/popper.min.js" integrity="sha384-KsvD1yqQ1/1+IA7gi3P0tyJcT3vR+NdBTt13hSJ2lnve8agRGXTTyNaBYmCR/Nwi" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.min.js" integrity="sha384-nsg8ua9HAw1y0W1btsyWgBklPnCUAFLuTMS2G72MMONqmOymq585AcH49TLBQObG" crossorigin="anonymous"></script>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="css/bootstrap2.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

</head>


<body>
	<header>
		<?php

		include 'header.php';
		if (isset($_SESSION['id'])) {
		} else {
			header('location:connexion.php');
		}



		if (isset($_POST['submit'])) {

			$user->Update($_POST['login'], $_POST['prenom'], $_POST['nom'], $_POST['password'], $_POST['newpassword'], $_POST['id']);
		}



		?>







		<main>
			<div class="row mx-5 d-flex justify-content-center">

				<form method="post" action="" class="w-25 p-3 mt-5   bg-dark text-white">
					<h2 class="panel-titles text-center mt-5 text-warning ">Profil </h2>
					<div class="mb-3">
						<label class="form-label">Login</label>
						<input type="login" name="login" class="form-control" placeholder="<?php echo $results['login'] ?>" />

					</div>
					<div class="mb-3">
						<label class="form-label">Prenom</label>
						<input type="prenom" name="prenom" class="form-control" placeholder="<?php echo $results['prenom'] ?>" />

					</div>
					<div class="mb-3">
						<label class="form-label">Nom</label>
						<input type="enom" name="nom" class="form-control" placeholder="<?php echo $results['nom'] ?>" />

					</div>
					<div class="mb-3">
						<label class="form-label">Mot de passe</label>
						<input type="password" name="password" class="form-control">

					</div>
					<div class="mb-3">
						<label for="exampleInputPassword1" class="form-label">Répéter votre mot de passe</label>
						<input type="password" name="newpassword" class="form-control">
					</div>
					<input type="hidden" name="id" class="form-control" id="id" size="40" value="<?= $ssid ?>" />

					<button type="submit" name="submit" class="btn btn-warning">valider</button>
				</form>

			</div>
		</main>

		<footer><?php include("footer.php"); ?></footer>

</body>

</html>