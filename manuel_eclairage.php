<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if(!isset($_SESSION["username"])){
    header("Location: login.php");
    exit(); 
  }
?>
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
    	<link rel="stylesheet" type="text/css" href="w3.css">
		<script type="text/javascript" src="script.js"></script>               <!-- script javascript script.js pour gérer les boutons et affichages--> 
	</head>
	<body class="w3-animate-opacity">  
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
					<h1 class="h__slogan--title">Administrateur</h1>
					<a href="presentation.html"class="h__slogan--btn">En savoir plus</a>
				</div>
			</div>
		</div>
		


        <div class="w3-margin w3-center w3-card w3-padding-24">
            <h3 class="w3-padding">Arrosage de la serre: <span id="aff_avant"></span></h3>
            <button onclick="testAvantOnButton()" class="w3-btn w3-green w3-xlarge w3-ripple w3-wide" style="width:30%;">ON</button>
            <button onclick="testAvantOffButton()" class="w3-btn w3-orange w3-xlarge w3-ripple w3-wide" style="width:30%;">OFF</button>             
            <br><br>
        </div>

        <div class="w3-margin w3-center w3-card w3-padding-24">
            <a href="index.php" class="w3-btn w3-red w3-xlarge w3-ripple w3-wide" style="width:60%;">RETOUR</a>
        </div>
        <script>  
            setInterval(function maj_aff_1Hz()  // Appelée toute les secondes: Affiche les sorties actives (test)
            {
            var xhttp;  
            if (window.XMLHttpRequest)       xhttp  = new XMLHttpRequest();                      //  Objet standard: Firefox, Safari, ...
            else  if (window.ActiveXObject)  xhttp  = new ActiveXObject("Microsoft.XMLHTTP");    //  Internet Explorer

            xhttp.onreadystatechange = function()  // On associe un traitement (une fonction anonyme en l'occurrence) à cet indicateur d'évènement.
            {
            if(xhttp.readyState == 4 && xhttp.status == 200) // 4 signifie que la réponse est envoyée par le serveur et disponible.  Requete = 200 = OK
                {
                const words = xhttp.responseText.split('~');                  // Sépare la chaine recue selon les délimiteurs "~"   
                document.getElementById("aff_avant"  ).innerHTML = words[0];  // Récupère l'état de la sortie
                document.getElementById("aff_cuve"   ).innerHTML = words[1];  // Récupère l'état de la sortie
                document.getElementById("aff_jardin" ).innerHTML = words[2];  // Récupère l'état de la sortie
                document.getElementById("aff_potager").innerHTML = words[3];  // Récupère l'état de la sortie
                }
            };

            xhttp.open("GET", "lire_aff_test_1hz", true);  // Appelle la "page" /lire_aff_test_1hz sur le server (voir main.html)
            xhttp.send(); // Envoi des données au serveur

            }, 1000);  

        </script> 


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