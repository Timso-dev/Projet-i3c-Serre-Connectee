<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title>Serre Connectée | Contact</title>
		<link rel="icon" type="image/png" href="/img/logo.png" />
		<script src="https://kit.fontawesome.com/6a4fe63112.js" crossorigin="anonymous"></script>
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;700&display=swap" rel="stylesheet">
		<link rel="preconnect" href="https://fonts.gstatic.com">
		<link href="https://fonts.googleapis.com/css2?family=Anton&display=swap" rel="stylesheet">
		<link rel="stylesheet" href="css/base.css">
		<link rel="stylesheet" href="css/header.css">
        <link rel="stylesheet" href="css/contact.css">
		<link rel="stylesheet" href="css/footer.css">
	</head>
	<body>
		<div class="header header__article">
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
					<h1 class="h__slogan--title">Contact</h1>
					<a href="index.html"class="h__slogan--btn"><i class="fas fa-chevron-left"></i> Retour</a>
				</div>
			</div>
		</div>
		<div class="articles">
			<div class="container">
				<h2 class="articles__title">Contact</h2>
				<div class="articles__items">
					<a href="" class="article" style="background-color: #333;background-size: cover;">
						<div class="article__filter"></div>
						<div class="article__name">EMAIL :</div>
						<div class="article__name2">corentin.poret@etu.unilasalle.fr</div>
						<div class="article__icon"><i class="fas fa-envelope"></i></div>
					</a>
					<a href="" class="article" style="background-color: #333;background-size: cover;">
						<div class="article__filter"></div>
						<div class="article__name"> NUMÉRO DE TÉLÉPHONE :</div>
						<div class="article__name2">06 84 59 22 67</div>
						<div class="article__icon"><i class="fas fa-phone"></i></div>
					</a>
					<a href="" class="article" style="background-color: #333;background-size: cover;">
						<div class="article__filter"></div>
						<div class="article__name">ADRESSE POSTALE :</div>
						<div class="article__name2">14 Quai de la Somme, 80080 Amiens</div>
						<div class="article__icon"><i class="fas fa-map-marker-alt"></i></div>
					</a>
				
                </div>
                
                <h2 >Contactez-nous</h2>
                <form method="post">
                    <input type="text" name="nom" placeholder ="Nom" required>
                    <input type="email" name="email" placeholder ="Email" required>
                    <input type="text" name="sujet" placeholder ="Sujet" required>
                    <textarea name="message" placeholder ="Message" required></textarea>
                    <input type="submit" value="Envoyer le message">
                </form>
                <?php
                if (isset($_POST['message'])) {
                    $entete  = 'MIME-Version: 1.0' . "\r\n";
                    $entete .= 'Content-type: text/html; charset=utf-8' . "\r\n";
                    $entete .= 'From: greenhouse.unilasalle.fr' . "\r\n";
                    $entete .= 'Reply-to: ' . $_POST['email'];

                    $message = "Message envoye depuis la page Contact de greenhouse.unilasalle.fr
                    Nom : ". $_POST["nom"] . "
                    Email : ". $_POST["email"] . "
                    Sujet : ". $_POST["sujet"] ."
                    Message : ". $_POST["message"];

                    $retour = mail('corentin.poret@etu.unilasalle.fr', 'Envoi depuis page Contact',
                    $message, "From:contact@exemplelesite.fr". "\r\n" ."Reply-to". $_POST["message"]);
                    if($retour)
                        echo '<p>Votre message a bien été envoyé.</p>';
                }
                ?>
            </div>
        </div>
		<script
  		src="https://code.jquery.com/jquery-3.3.1.min.js"
  		integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  		crossorigin="anonymous"></script>
		<script src="js/app.js"></script>
		<footer>
			<div class="footer-content">
				<h3 class="footer_name">GREENHOUSE</h3>
				<p>Projet I3</p>
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