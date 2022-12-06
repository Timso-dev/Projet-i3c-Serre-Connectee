<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Serre Connectée | Accueil</title>
		<link rel="icon" type="image/png" href="/img/logo.png" />
		<script src="https://kit.fontawesome.com/6a4fe63112.js" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/header.css">
		<link rel="stylesheet" href="css/articles.css">
		<link rel="stylesheet" href="css/footer.css">
		<link rel="stylesheet" href="css/style.css">
	</head>
	<body>
		<div class="header">
			<div class="header__texture"></div>
			<div class="header__mask">
				<svg width="100%" height="100%" viewBox="0 0 100 100" preserveAspectRatio="none">
					<path d="M0 100 L 0 0 C 25 100 75 100 100 0 L 100 100" fill="#fff"></path>
				</svg>
			</div>
			<div class="container">
				<div class="header__navbar">
					<div class="header__navbar--logo">
					<img src="img/logo2.png" alt="Cinque Terre" width="150" height="100">
					</div>
					<div class="header__navbar--menu">
					<a href="index.html" class="header__navbar--menu-link"><i class="fas fa-home"></i> Accueil</a>
					<a href="contact.php" class="header__navbar--menu-link"><i class="fas fa-phone"></i> Contact</a>
					<a href="login.php" class="header__navbar--menu-link"><i class="fas fa-user"></i> Login</a>
					</div>
					<div class="header__navbar-toggle">
						<span class="header__navbar-toggle-icons"></span> 
					</div>
				</div>
				<div class="header__slogan">
					<h1 class="h__slogan--title">Connexion</h1>
					<a href="presentation.html"class="h__slogan--btn">En savoir plus</a>
				</div>
			</div>
		</div>
		<div class="articles">
			<?php
			require('config.php');
			session_start();

			if (isset($_POST['username'])){
				$username = stripslashes($_REQUEST['username']);
				$username = mysqli_real_escape_string($conn, $username);
				$password = stripslashes($_REQUEST['password']);
				$password = mysqli_real_escape_string($conn, $password);
					$query = "SELECT * FROM `users` WHERE username='$username' and password='".hash('sha256', $password)."'";
				$result = mysqli_query($conn,$query) or die(mysql_error());
				$rows = mysqli_num_rows($result);
			if($rows==1){
				$_SESSION['username'] = $username;
				header("Location: index.php");
			}else{
				$message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
			}
			}
			?>
			<form class="box" action="" method="post" name="login">
			<h1 class="box-title">Connexion</h1>
			<h1 class="box-title">Administrateur</h1>
			<input type="text" class="box-input" name="username" placeholder="Nom d'utilisateur">
			<input type="password" class="box-input" name="password" placeholder="Mot de passe">
			<input type="submit" value="Connexion " name="submit" class="box-button">
			<p class="box-register">Vous êtes nouveau ici? <a href="register.php">S'inscrire</a></p>
			<?php if (! empty($message)) { ?>
				<p class="errorMessage"><?php echo $message; ?></p>
			<?php } ?>
			</form>
		</div>
		<footer>
			<div class="footer-content">
				<h3 class="footer_name">GREENHOUSE</h3>
				<p>ConnexionProjet I3</p>
				<div class="socials">
					<li><a href="https://www.youtube.com/user/ESIEEAmiens1"><i class="fa fa-youtube"></i></a></li>
					<li><a href="https://twitter.com/ESIEEAmiens"><i class="fa fa-twitter"></i></a></li>
					<li><a href="https://www.instagram.com/esieeunilasalleamiens/"><i class="fa fa-instagram"></i></a></li>
					<li><a href="https://www.myunilasalleamiens.eu/"><i class="fa fa-graduation-cap"></i></a></li>
				</div>
			</div>
			<div class="footer-bottom">
				<p>copyright &copy;GREENHOUSE 2022 | designed by <span>Corentin PORET</span></p>
			</div>
		</footer>
    </body>
    </html>